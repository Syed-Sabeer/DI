<?php

namespace App\Mail;

use App\Models\Blog;
use App\Models\NewNewsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class BlogNewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Blog $blog,
        public NewNewsletter $subscriber
    ) {
    }

    public function build(): self
    {
        return $this->subject('New from Deveon: '.$this->blog->title)
            ->view('emails.blog-newsletter')
            ->with([
                'articleUrl' => route('blog.detail', $this->blog->slug),
                'unsubscribeUrl' => URL::signedRoute('newsletter.unsubscribe', [
                    'subscriber' => $this->subscriber->getKey(),
                ]),
            ]);
    }
}
