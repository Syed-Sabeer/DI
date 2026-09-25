<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\QueueCareerAlert;
use App\Jobs\ResendCareerAlert;
use App\Models\Career;
use App\Models\CareerAlertDelivery;
use App\Models\NewNewsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class AdminCareerController extends Controller
{
    public function index()
    {
        $careers = Career::query()
            ->withCount([
                'alertDeliveries',
                'alertDeliveries as alert_resendable_count' => fn ($query) => $query
                    ->where('resend_enabled', true)
                    ->whereIn('status', ['sent', 'failed', 'cancelled', 'selected']),
            ])
            ->latest()
            ->paginate(20);

        return view('admin.crud.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.crud.careers.form', array_merge(
            ['career' => new Career],
            $this->alertAudienceData(null)
        ));
    }

    public function store(Request $request)
    {
        $career = Career::create($this->validated($request));

        $message = 'Career added successfully.';

        if ($request->boolean('send_alert')) {
            $subscriberIds = $this->requestedAudience($request);

            if (! $career->visibility) {
                $message .= ' The job alert was not sent because the posting is hidden — make it visible, then use Resend.';
            } elseif ($subscriberIds === []) {
                $message .= ' No job alert was sent because no subscribers were selected.';
            } else {
                try {
                    QueueCareerAlert::dispatch($career->id, $subscriberIds)
                        ->onConnection('database');

                    $message .= ' The job alert has been queued for background delivery.';
                } catch (\Throwable $queueException) {
                    Log::error('Unable to queue career alert:', [
                        'career_id' => $career->id,
                        'message' => $queueException->getMessage(),
                    ]);

                    return redirect()->route('admin.careers.index')
                        ->with('success', $message)
                        ->with('warning', 'The career was saved, but its job alert could not be queued. Please check the queue configuration.');
                }
            }
        }

        return redirect()->route('admin.careers.index')->with('success', $message);
    }

    public function edit(Career $career)
    {
        return view('admin.crud.careers.form', array_merge(
            compact('career'),
            $this->alertAudienceData($career)
        ));
    }

    public function update(Request $request, Career $career)
    {
        $career->update($this->validated($request, $career));

        $this->syncAlertResendAudience(
            $career,
            $request->boolean('alert_recipients_enabled'),
            $request->input('alert_audience', 'all'),
            array_map('intval', $request->input('alert_subscriber_ids', []))
        );

        $message = 'Career updated successfully.';

        // An alert can also be sent for the first time from the edit screen,
        // e.g. when the posting was drafted hidden and has just gone live.
        if ($request->boolean('send_alert') && $career->visibility && $this->requestedAudience($request) !== []) {
            try {
                $subscriberIds = $this->requestedAudience($request);

                QueueCareerAlert::dispatch($career->id, $subscriberIds)
                    ->onConnection('database');

                $message .= ' The job alert has been queued for subscribers who have not received it yet.';
            } catch (\Throwable $queueException) {
                Log::error('Unable to queue career alert:', [
                    'career_id' => $career->id,
                    'message' => $queueException->getMessage(),
                ]);

                return redirect()->route('admin.careers.index')
                    ->with('success', $message)
                    ->with('warning', 'The career was saved, but its job alert could not be queued.');
            }
        }

        return redirect()->route('admin.careers.index')->with('success', $message);
    }

    public function destroy(Career $career)
    {
        $career->delete();

        return redirect()->route('admin.careers.index')->with('success', 'Career deleted successfully.');
    }

    public function toggleVisibility(Career $career)
    {
        $career->update(['visibility' => ! $career->visibility]);

        return back()->with('success', 'Career visibility updated.');
    }

    /**
     * Per-vacancy delivery report: who was emailed, who opened it and who went
     * on to open the vacancy page itself.
     */
    public function alertAnalytics(Request $request, Career $career)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'engagement' => 'nullable|in:all,opened,not_opened,viewed,not_viewed,opened_not_viewed',
            'status' => 'nullable|in:all,sent,failed,queued,selected,cancelled',
            'sort' => 'nullable|in:latest,oldest,most_opens,most_views,email',
        ]);

        $deliveryQuery = CareerAlertDelivery::query()->where('career_id', $career->getKey());

        $summary = (clone $deliveryQuery)
            ->selectRaw("SUM(CASE WHEN status = 'sent' THEN 1 ELSE 0 END) as sent_count")
            ->selectRaw("SUM(CASE WHEN status = 'failed' THEN 1 ELSE 0 END) as failed_count")
            ->selectRaw("SUM(CASE WHEN status IN ('queued', 'resend_queued') THEN 1 ELSE 0 END) as queued_count")
            ->selectRaw('SUM(CASE WHEN opened_at IS NOT NULL THEN 1 ELSE 0 END) as opened_count')
            ->selectRaw('SUM(CASE WHEN viewed_at IS NOT NULL THEN 1 ELSE 0 END) as viewed_count')
            ->selectRaw('COALESCE(SUM(open_count), 0) as total_open_events')
            ->selectRaw('COALESCE(SUM(view_count), 0) as total_view_events')
            ->first();

        $sentCount = (int) $summary->sent_count;
        $openRate = $sentCount > 0 ? round(((int) $summary->opened_count / $sentCount) * 100, 1) : 0;
        $viewRate = $sentCount > 0 ? round(((int) $summary->viewed_count / $sentCount) * 100, 1) : 0;

        $applicationCount = $career->applications()->count();

        $deliveries = $deliveryQuery
            ->with('subscriber:id,email')
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('email', 'like', '%'.trim($request->string('search')).'%');
            })
            ->when($request->input('engagement') === 'opened', fn ($query) => $query->whereNotNull('opened_at'))
            ->when($request->input('engagement') === 'not_opened', fn ($query) => $query->whereNull('opened_at'))
            ->when($request->input('engagement') === 'viewed', fn ($query) => $query->whereNotNull('viewed_at'))
            ->when($request->input('engagement') === 'not_viewed', fn ($query) => $query->whereNull('viewed_at'))
            ->when($request->input('engagement') === 'opened_not_viewed', fn ($query) => $query->whereNotNull('opened_at')->whereNull('viewed_at'))
            ->when($request->filled('status') && $request->input('status') !== 'all', function ($query) use ($request) {
                if ($request->input('status') === 'queued') {
                    $query->whereIn('status', ['queued', 'resend_queued']);
                } else {
                    $query->where('status', $request->input('status'));
                }
            })
            ->when($request->input('sort', 'latest') === 'latest', fn ($query) => $query->latest('updated_at'))
            ->when($request->input('sort') === 'oldest', fn ($query) => $query->oldest('updated_at'))
            ->when($request->input('sort') === 'most_opens', fn ($query) => $query->orderByDesc('open_count')->latest('updated_at'))
            ->when($request->input('sort') === 'most_views', fn ($query) => $query->orderByDesc('view_count')->latest('updated_at'))
            ->when($request->input('sort') === 'email', fn ($query) => $query->orderBy('email'))
            ->paginate(20)
            ->withQueryString();

        return view('admin.crud.careers.alert-analytics', compact(
            'career',
            'summary',
            'openRate',
            'viewRate',
            'applicationCount',
            'deliveries'
        ));
    }

    public function resendAlert(Request $request, Career $career)
    {
        $validated = $request->validate([
            'password' => 'required|string|max:255',
        ]);

        if (! hash_equals((string) config('newsletter.resend_password'), $validated['password'])) {
            return back()->withErrors([
                'password' => 'The resend password is incorrect.',
            ]);
        }

        if (! $career->visibility) {
            return back()->with('warning', 'This job posting must be visible before its alert can be resent.');
        }

        $resendCount = DB::transaction(function () use ($career): int {
            $count = CareerAlertDelivery::query()
                ->where('career_id', $career->getKey())
                ->where('resend_enabled', true)
                ->whereIn('status', ['sent', 'failed', 'cancelled', 'selected'])
                ->update([
                    'status' => 'resend_queued',
                    'failure_message' => null,
                    'updated_at' => now(),
                ]);

            if ($count > 0) {
                ResendCareerAlert::dispatch($career->getKey())
                    ->onConnection('database');
            }

            return $count;
        });

        if ($resendCount === 0) {
            return back()->with('warning', 'There are no sent or failed job alerts available to resend.');
        }

        return back()->with('success', number_format($resendCount).' job alert '.str('recipient')->plural($resendCount).' queued for resend.');
    }

    /**
     * null means "every subscriber"; an array limits the send to those ids.
     * An empty array means the admin chose a specific audience but picked nobody.
     */
    private function requestedAudience(Request $request): ?array
    {
        if ($request->input('alert_audience') !== 'selected') {
            return null;
        }

        return array_values(array_unique(
            array_map('intval', (array) $request->input('alert_subscriber_ids', []))
        ));
    }

    /**
     * Subscriber list plus the currently selected resend audience, shared by the
     * create and edit screens.
     */
    private function alertAudienceData(?Career $career): array
    {
        $subscribers = NewNewsletter::query()->orderBy('email')->get(['id', 'email']);
        $subscriberCount = $subscribers->count();

        $selectedSubscriberIds = $career
            ? $career->alertDeliveries()
                ->where('resend_enabled', true)
                ->pluck('newsletter_subscriber_id')
                ->map(fn ($id) => (int) $id)
                ->all()
            : [];

        $alertRecipientsEnabled = count($selectedSubscriberIds) > 0;
        $alertAudience = $alertRecipientsEnabled && count($selectedSubscriberIds) === $subscriberCount
            ? 'all'
            : ($alertRecipientsEnabled ? 'selected' : 'all');

        $alertSentCount = $career
            ? $career->alertDeliveries()->where('status', 'sent')->count()
            : 0;

        $alertDeliveryCount = $career ? $career->alertDeliveries()->count() : 0;

        return compact(
            'subscribers',
            'subscriberCount',
            'selectedSubscriberIds',
            'alertRecipientsEnabled',
            'alertAudience',
            'alertSentCount',
            'alertDeliveryCount'
        );
    }

    /**
     * Records which subscribers stay eligible for a resend of this vacancy.
     * Rows created here sit in the 'selected' state until an alert is queued.
     */
    private function syncAlertResendAudience(Career $career, bool $enabled, string $audience, array $subscriberIds): void
    {
        DB::transaction(function () use ($career, $enabled, $audience, $subscriberIds): void {
            CareerAlertDelivery::query()
                ->where('career_id', $career->getKey())
                ->update(['resend_enabled' => false, 'updated_at' => now()]);

            if (! $enabled) {
                return;
            }

            NewNewsletter::query()
                ->when($audience === 'selected', fn ($query) => $query->whereIn('id', $subscriberIds))
                ->select(['id', 'email'])
                ->orderBy('id')
                ->chunkById(250, function ($subscribers) use ($career): void {
                    $now = now();
                    $rows = $subscribers->map(fn ($subscriber) => [
                        'career_id' => $career->getKey(),
                        'newsletter_subscriber_id' => $subscriber->getKey(),
                        'email' => $subscriber->email,
                        'status' => 'selected',
                        'resend_enabled' => true,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ])->all();

                    CareerAlertDelivery::query()->upsert(
                        $rows,
                        ['career_id', 'newsletter_subscriber_id'],
                        ['email', 'resend_enabled', 'updated_at']
                    );
                });
        });
    }

    private function validated(Request $request, ?Career $career = null): array
    {
        $data = $request->validate([
            'job_title' => 'required|string|max:255',
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('careers')->ignore($career?->id)],
            'description' => 'required|string',
            'experience' => 'nullable|string|max:255',
            'education' => 'nullable|string|max:255',
            'salary_range' => 'nullable|string|max:255',
            'job_type' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'work_schedule' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'workweek' => 'nullable|string|max:255',
            'application_deadline' => 'nullable|date',
            'responsibilities_description' => 'nullable|string',
            'responsibilities_points' => 'nullable|array',
            'responsibilities_points.*' => 'nullable|string|max:1000',
            'qualifications_description' => 'nullable|string',
            'qualifications_points' => 'nullable|array',
            'qualifications_points.*' => 'nullable|string|max:1000',
            'experience_description' => 'nullable|string',
            'experience_points' => 'nullable|array',
            'experience_points.*' => 'nullable|string|max:1000',
            'visibility' => 'nullable|boolean',
            'send_alert' => 'nullable|boolean',
            'alert_recipients_enabled' => 'nullable|boolean',
            'alert_audience' => 'nullable|in:all,selected',
            'alert_subscriber_ids' => [
                'exclude_if:alert_audience,all',
                'nullable', 'array',
            ],
            'alert_subscriber_ids.*' => 'integer|distinct|exists:new_newsletters,id',
        ]);

        foreach (['responsibilities_points', 'qualifications_points', 'experience_points'] as $field) {
            $data[$field] = array_values(array_filter($data[$field] ?? [], fn ($point) => trim((string) $point) !== ''));
        }

        $data['visibility'] = $request->boolean('visibility');

        // Alert fields are transport concerns, not columns on the careers table.
        unset(
            $data['send_alert'],
            $data['alert_recipients_enabled'],
            $data['alert_audience'],
            $data['alert_subscriber_ids']
        );

        return $data;
    }
}
