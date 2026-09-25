<?php

namespace App\Jobs;

use App\Mail\CareerAlertMail;
use App\Models\CareerAlertDelivery;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SendCareerAlertEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;

    public int $timeout = 90;

    public array $backoff = [60, 300];

    public function __construct(public int $deliveryId)
    {
    }

    public function handle(): void
    {
        $delivery = CareerAlertDelivery::query()
            ->with(['career', 'subscriber'])
            ->find($this->deliveryId);

        if (! $delivery || $delivery->status === 'sent' || ! $delivery->career || ! $delivery->subscriber) {
            return;
        }

        if (! $delivery->career->visibility) {
            $delivery->update(['status' => 'cancelled']);

            return;
        }

        Mail::to($delivery->email)->send(
            new CareerAlertMail($delivery)
        );

        $delivery->update([
            'status' => 'sent',
            'sent_at' => now(),
            'failure_message' => null,
        ]);
    }

    public function failed(Throwable $exception): void
    {
        CareerAlertDelivery::query()
            ->whereKey($this->deliveryId)
            ->update([
                'status' => 'failed',
                'failure_message' => mb_substr($exception->getMessage(), 0, 2000),
            ]);
    }
}
