<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogNewsletterDelivery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class NewsletterTrackingController extends Controller
{
    public function open(int $delivery): Response
    {
        $delivery = BlogNewsletterDelivery::query()->findOrFail($delivery);
        $now = now();

        try {
            DB::update(
                'UPDATE blog_newsletter_deliveries
                 SET opened_at = COALESCE(opened_at, ?), last_opened_at = ?, open_count = open_count + 1, updated_at = ?
                 WHERE id = ?',
                [$now, $now, $now, $delivery->getKey()]
            );
        } catch (\Throwable) {
            // Tracking must never interfere with rendering the email pixel.
        }

        $pixel = base64_decode('R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=', true);

        return response($pixel === false ? '' : $pixel, 200, [
            'Content-Type' => 'image/gif',
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0, private',
            'Pragma' => 'no-cache',
            'Expires' => 'Thu, 01 Jan 1970 00:00:00 GMT',
            'X-Content-Type-Options' => 'nosniff',
        ]);
    }

    public function view(int $delivery): RedirectResponse
    {
        $delivery = BlogNewsletterDelivery::query()->with('blog')->findOrFail($delivery);
        $blog = $delivery->blog;

        abort_unless($blog, 404);

        $now = now();

        try {
            DB::update(
                'UPDATE blog_newsletter_deliveries
                 SET viewed_at = COALESCE(viewed_at, ?), last_viewed_at = ?, view_count = view_count + 1, updated_at = ?
                 WHERE id = ?',
                [$now, $now, $now, $delivery->getKey()]
            );
        } catch (\Throwable) {
            // A tracking failure must never prevent access to the article.
        }

        return redirect()->route('blog.detail', $blog->slug);
    }
}
