<?php

namespace App\Jobs;

use App\Models\Blog;
use App\Models\BlogNewsletterDelivery;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class ResendBlogNewsletter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;

    public int $timeout = 120;

    public function __construct(public int $blogId)
    {
    }

    public function handle(): void
    {
        $blog = Blog::query()->find($this->blogId);

        if (! $blog) {
            return;
        }

        if (! $blog->visibility) {
            BlogNewsletterDelivery::query()
                ->where('blog_id', $this->blogId)
                ->where('status', 'resend_queued')
                ->update(['status' => 'cancelled', 'updated_at' => now()]);

            return;
        }

        BlogNewsletterDelivery::query()
            ->where('blog_id', $this->blogId)
            ->where('status', 'resend_queued')
            ->select('id')
            ->orderBy('id')
            ->chunkById(250, function ($deliveries): void {
                $deliveryIds = $deliveries->pluck('id')->all();

                DB::transaction(function () use ($deliveryIds): void {
                    BlogNewsletterDelivery::query()
                        ->whereIn('id', $deliveryIds)
                        ->update([
                            'status' => 'queued',
                            'failure_message' => null,
                            'updated_at' => now(),
                        ]);

                    foreach ($deliveryIds as $deliveryId) {
                        SendBlogNewsletterEmail::dispatch($deliveryId)
                            ->onConnection('database');
                    }
                });
            });
    }
}
