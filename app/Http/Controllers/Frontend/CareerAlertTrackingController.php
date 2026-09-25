<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CareerAlertDelivery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CareerAlertTrackingController extends Controller
{
    /**
     * Transparent pixel embedded in the job alert. Records that the email was
     * rendered by the recipient's client.
     */
    public function open(int $delivery): Response
    {
        $delivery = CareerAlertDelivery::query()->findOrFail($delivery);
        $now = now();

        try {
            DB::update(
                'UPDATE career_alert_deliveries
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

    /**
     * Click-through from the alert to the vacancy page. Records the visit, then
     * forwards to the public listing.
     */
    public function view(int $delivery): RedirectResponse
    {
        $delivery = CareerAlertDelivery::query()->with('career')->findOrFail($delivery);
        $career = $delivery->career;

        abort_unless($career, 404);

        $now = now();

        try {
            DB::update(
                'UPDATE career_alert_deliveries
                 SET viewed_at = COALESCE(viewed_at, ?), last_viewed_at = ?, view_count = view_count + 1, updated_at = ?
                 WHERE id = ?',
                [$now, $now, $now, $delivery->getKey()]
            );
        } catch (\Throwable) {
            // A tracking failure must never prevent access to the vacancy.
        }

        return redirect()->route('careers.show', $career->slug);
    }
}
