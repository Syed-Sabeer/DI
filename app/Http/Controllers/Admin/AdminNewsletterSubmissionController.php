<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogNewsletterDelivery;
use App\Models\NewNewsletter;
use Illuminate\Http\Request;

class AdminNewsletterSubmissionController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->validate([
            'search' => 'nullable|string|max:255',
            'date_from' => 'nullable|date',
            'date_to' => 'nullable|date',
            'sort' => 'nullable|in:newest,oldest',
        ]);

        $newsletters = NewNewsletter::query()
            ->withCount([
                'deliveries as emails_sent_count' => fn ($query) => $query->where('status', 'sent'),
                'deliveries as emails_opened_count' => fn ($query) => $query->whereNotNull('opened_at'),
                'deliveries as blogs_viewed_count' => fn ($query) => $query->whereNotNull('viewed_at'),
            ])
            ->withMax('deliveries', 'sent_at')
            ->withMax('deliveries', 'last_opened_at')
            ->withMax('deliveries', 'last_viewed_at')
            ->when($request->filled('search'), fn ($query) => $query->where('email', 'like', '%'.trim($request->string('search')).'%'))
            ->when($request->filled('date_from'), fn ($query) => $query->whereDate('created_at', '>=', $request->date_from))
            ->when($request->filled('date_to'), fn ($query) => $query->whereDate('created_at', '<=', $request->date_to))
            ->orderBy('created_at', ($filters['sort'] ?? 'newest') === 'oldest' ? 'asc' : 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.submissions.newsletters.index', compact('newsletters'));
    }

    public function activity(Request $request, NewNewsletter $subscriber)
    {
        $filters = $request->validate([
            'engagement' => 'nullable|in:all,opened,viewed',
        ]);

        $deliveryQuery = BlogNewsletterDelivery::query()
            ->where('newsletter_subscriber_id', $subscriber->getKey());

        $summary = (clone $deliveryQuery)
            ->selectRaw("SUM(CASE WHEN status = 'sent' THEN 1 ELSE 0 END) as emails_sent")
            ->selectRaw('SUM(CASE WHEN opened_at IS NOT NULL THEN 1 ELSE 0 END) as emails_opened')
            ->selectRaw('SUM(CASE WHEN viewed_at IS NOT NULL THEN 1 ELSE 0 END) as blogs_viewed')
            ->selectRaw('COALESCE(SUM(view_count), 0) as total_blog_views')
            ->first();

        $deliveries = $deliveryQuery
            ->with('blog:id,title,slug')
            ->when(($filters['engagement'] ?? 'all') === 'opened', fn ($query) => $query->whereNotNull('opened_at'))
            ->when(($filters['engagement'] ?? 'all') === 'viewed', fn ($query) => $query->whereNotNull('viewed_at'))
            ->latest('updated_at')
            ->paginate(20)
            ->withQueryString();

        return view('admin.submissions.newsletters.activity', compact('subscriber', 'summary', 'deliveries'));
    }

    public function destroy($id)
    {
        $newsletter = NewNewsletter::findOrFail($id);
        $newsletter->delete();

        return redirect()->back()->with('success', 'Newsletter deleted successfully.');
    }


}
