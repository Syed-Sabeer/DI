<?php

namespace Tests\Feature;

use App\Http\Controllers\Frontend\ContactController;
use App\Models\ContactSubmission;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Tests\TestCase;

class ContactSubmissionTest extends TestCase
{
    use DatabaseTransactions;

    public function test_contact_submit_handler_is_rendered_only_once(): void
    {
        $html = view('frontend.contact')->render();

        // The guard is referenced twice inside one handler. Four occurrences
        // would mean the page script had been rendered twice.
        $this->assertSame(2, substr_count($html, 'submitHandlerBound'));
    }

    public function test_repeated_submission_creates_and_emails_only_once(): void
    {
        // One admin email and one customer confirmation, only on the first request.
        Mail::shouldReceive('send')->twice();

        $email = uniqid('contact-', true).'@example.com';
        $token = (string) Str::uuid();
        $payload = [
            'submission_token' => $token,
            'fullname' => 'Contact Test',
            'phone' => '+1 555 0100',
            'email' => $email,
            'subject' => 'A project enquiry',
            'message' => 'This is a sufficiently detailed contact message.',
            'privacy' => '1',
        ];

        $controller = app(ContactController::class);
        $firstResponse = $controller->store(Request::create('/contact/submit', 'POST', $payload));
        $secondResponse = $controller->store(Request::create('/contact/submit', 'POST', $payload));

        $this->assertSame(200, $firstResponse->getStatusCode());
        $this->assertNotSame(200, $secondResponse->getStatusCode());
        $this->assertSame(1, ContactSubmission::query()->where('submission_token', $token)->count());
    }
}
