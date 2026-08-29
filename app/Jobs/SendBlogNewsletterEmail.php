<?php

namespace App\Jobs;

use App\Mail\BlogNewsletterMail;
use App\Models\BlogNewsletterDelivery;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SendBlogNewsletterEmail implements ShouldQueue
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
        $delivery = BlogNewsletterDelivery::query()
            ->with(['blog', 'subscriber'])
            ->find($this->deliveryId);

        if (! $delivery || $delivery->status === 'sent' || ! $delivery->blog || ! $delivery->subscriber) {
            return;
        }

        if (! $delivery->blog->visibility) {
            $delivery->update(['status' => 'cancelled']);

            return;
        }

        Mail::to($delivery->email)->send(
            new BlogNewsletterMail($delivery->blog, $delivery->subscriber)
        );

        $delivery->update([
            'status' => 'sent',
            'sent_at' => now(),
            'failure_message' => null,
        ]);
    }

    public function failed(Throwable $exception): void
    {
        BlogNewsletterDelivery::query()
            ->whereKey($this->deliveryId)
            ->update([
                'status' => 'failed',
                'failure_message' => mb_substr($exception->getMessage(), 0, 2000),
            ]);
    }
}
