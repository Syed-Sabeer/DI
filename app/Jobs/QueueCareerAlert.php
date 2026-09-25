<?php

namespace App\Jobs;

use App\Models\Career;
use App\Models\CareerAlertDelivery;
use App\Models\NewNewsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class QueueCareerAlert implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;

    public int $timeout = 120;

    public ?array $subscriberIds = null;

    public function __construct(public int $careerId, ?array $subscriberIds = null)
    {
        $this->subscriberIds = $subscriberIds;
    }

    public function handle(): void
    {
        $career = Career::query()->find($this->careerId);

        if (! $career || ! $career->visibility) {
            return;
        }

        NewNewsletter::query()
            ->when($this->subscriberIds !== null, fn ($query) => $query->whereIn('id', $this->subscriberIds))
            ->select(['id', 'email'])
            ->orderBy('id')
            ->chunkById(250, function ($subscribers): void {
                foreach ($subscribers as $subscriber) {
                    $delivery = CareerAlertDelivery::firstOrCreate(
                        [
                            'career_id' => $this->careerId,
                            'newsletter_subscriber_id' => $subscriber->id,
                        ],
                        [
                            'email' => $subscriber->email,
                            'status' => 'queued',
                        ]
                    );

                    // 'selected' rows are placeholders written when an admin picks
                    // a resend audience; they have never actually been emailed, so
                    // they still need to be queued on the first real send.
                    if ($delivery->wasRecentlyCreated || $delivery->status === 'selected') {
                        if (! $delivery->wasRecentlyCreated) {
                            $delivery->update(['status' => 'queued', 'failure_message' => null]);
                        }

                        SendCareerAlertEmail::dispatch($delivery->id)
                            ->onConnection('database');
                    }
                }
            });
    }
}
