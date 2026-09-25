<?php

namespace App\Mail;

use App\Models\CareerAlertDelivery;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;
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

        // Mirrors the blog newsletter subject pattern, which reaches the Gmail
        // Primary tab reliably. Avoid promotional openers, salary figures and
        // deadline urgency here -- they push the message into Promotions.
        return $this->subject($career->job_title.' | Deveon Careers')
            ->view('emails.career-alert')
            ->with([
                'career' => $career,
                'applyUrl' => $applyUrl,
                'openTrackingUrl' => $openTrackingUrl,
                'unsubscribeUrl' => $unsubscribeUrl,
            ])
            ->withSymfonyMessage(function (Email $message) use ($oneClickUnsubscribeUrl): void {
                $message->getHeaders()->addTextHeader('List-Unsubscribe', '<'.$oneClickUnsubscribeUrl.'>');
                $message->getHeaders()->addTextHeader('List-Unsubscribe-Post', 'List-Unsubscribe=One-Click');
            });
    }
}
