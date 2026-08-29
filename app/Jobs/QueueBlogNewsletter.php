<?php

namespace App\Jobs;

use App\Models\Blog;
use App\Models\BlogNewsletterDelivery;
use App\Models\NewNewsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class QueueBlogNewsletter implements ShouldQueue
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

        if (! $blog || ! $blog->visibility) {
            return;
        }

        NewNewsletter::query()
            ->select(['id', 'email'])
            ->orderBy('id')
            ->chunkById(250, function ($subscribers): void {
                foreach ($subscribers as $subscriber) {
                    $delivery = BlogNewsletterDelivery::firstOrCreate(
                        [
                            'blog_id' => $this->blogId,
                            'newsletter_subscriber_id' => $subscriber->id,
                        ],
                        [
                            'email' => $subscriber->email,
                            'status' => 'queued',
                        ]
                    );

                    if ($delivery->wasRecentlyCreated) {
                        SendBlogNewsletterEmail::dispatch($delivery->id)
                            ->onConnection('database');
                    }
                }
            });
    }
}
