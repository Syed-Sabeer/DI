<?php

namespace App\Mail;

use App\Models\CareerAlertDelivery;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Symfony\Component\Mime\Email;

class CareerAlertMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public CareerAlertDelivery $delivery
    ) {
        $this->delivery->loadMissing(['career', 'subscriber']);
    }

    public function build(): self
    {
        $career = $this->delivery->career;
        $subscriber = $this->delivery->subscriber;

        $unsubscribeUrl = URL::signedRoute('newsletter.unsubscribe', [
            'subscriber' => $subscriber->getKey(),
        ]);
        $oneClickUnsubscribeUrl = URL::signedRoute('newsletter.unsubscribe.one-click', [
            'subscriber' => $subscriber->getKey(),
        ]);
        $applyUrl = URL::signedRoute('career-alert.track.view', [
            'delivery' => $this->delivery->getKey(),
        ]);
        $openTrackingUrl = URL::signedRoute('career-alert.track.open', [
            'delivery' => $this->delivery->getKey(),
        ]);

        $location = trim((string) $career->location);
        $subject = 'We are hiring: '.$career->job_title
            .($location !== '' ? ' — '.$location : '')
            .' | Deveon Careers';

        $preheader = Str::limit(
            preg_replace('/\s+/', ' ', strip_tags((string) $career->description)),
            130
        );

        return $this->subject($subject)
            ->view('emails.career-alert')
            ->with([
                'career' => $career,
                'applyUrl' => $applyUrl,
                'openTrackingUrl' => $openTrackingUrl,
                'unsubscribeUrl' => $unsubscribeUrl,
                'preheader' => $preheader,
            ])
            ->withSymfonyMessage(function (Email $message) use ($oneClickUnsubscribeUrl): void {
                $message->getHeaders()->addTextHeader('List-Unsubscribe', '<'.$oneClickUnsubscribeUrl.'>');
                $message->getHeaders()->addTextHeader('List-Unsubscribe-Post', 'List-Unsubscribe=One-Click');
            });
    }
}
