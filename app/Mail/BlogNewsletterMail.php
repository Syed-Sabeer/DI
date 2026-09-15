<?php

namespace App\Mail;

use App\Models\Blog;
use App\Models\NewNewsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;
use Symfony\Component\Mime\Email;

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
        $unsubscribeUrl = URL::signedRoute('newsletter.unsubscribe', [
            'subscriber' => $this->subscriber->getKey(),
        ]);
        $oneClickUnsubscribeUrl = URL::signedRoute('newsletter.unsubscribe.one-click', [
            'subscriber' => $this->subscriber->getKey(),
        ]);

        return $this->subject($this->blog->title.' | Deveon Insights')
            ->view('emails.blog-newsletter')
            ->with([
                'articleUrl' => route('blog.detail', $this->blog->slug),
                'unsubscribeUrl' => $unsubscribeUrl,
            ])
            ->withSymfonyMessage(function (Email $message) use ($oneClickUnsubscribeUrl): void {
                $message->getHeaders()->addTextHeader('List-Unsubscribe', '<'.$oneClickUnsubscribeUrl.'>');
                $message->getHeaders()->addTextHeader('List-Unsubscribe-Post', 'List-Unsubscribe=One-Click');
            });
    }
}
