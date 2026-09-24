<?php

namespace App\Mail;

use App\Models\BlogNewsletterDelivery;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;
use Symfony\Component\Mime\Email;

class BlogNewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public BlogNewsletterDelivery $delivery
    ) {
        $this->delivery->loadMissing(['blog', 'subscriber']);
    }

    public function build(): self
    {
        $blog = $this->delivery->blog;
        $subscriber = $this->delivery->subscriber;

        $unsubscribeUrl = URL::signedRoute('newsletter.unsubscribe', [
            'subscriber' => $subscriber->getKey(),
        ]);
        $oneClickUnsubscribeUrl = URL::signedRoute('newsletter.unsubscribe.one-click', [
            'subscriber' => $subscriber->getKey(),
        ]);
        $articleUrl = URL::signedRoute('newsletter.track.view', [
            'delivery' => $this->delivery->getKey(),
        ]);
        $openTrackingUrl = URL::signedRoute('newsletter.track.open', [
            'delivery' => $this->delivery->getKey(),
        ]);

        return $this->subject($blog->title.' | Deveon Insights')
            ->view('emails.blog-newsletter')
            ->with([
                'blog' => $blog,
                'articleUrl' => $articleUrl,
                'openTrackingUrl' => $openTrackingUrl,
                'unsubscribeUrl' => $unsubscribeUrl,
            ])
            ->withSymfonyMessage(function (Email $message) use ($oneClickUnsubscribeUrl): void {
                $message->getHeaders()->addTextHeader('List-Unsubscribe', '<'.$oneClickUnsubscribeUrl.'>');
                $message->getHeaders()->addTextHeader('List-Unsubscribe-Post', 'List-Unsubscribe=One-Click');
            });
    }
}
