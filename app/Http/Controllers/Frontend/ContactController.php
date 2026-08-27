<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactCmsPage;
use App\Models\ContactSubmission;
use App\Support\IpCountryResolver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function index()
    {
        $contact_details = ContactCmsPage::first();
        return view('frontend.contact', compact('contact_details'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'fullname' => 'required|string|max:255',
                'phone' => 'required|string|max:30',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string|min:10|max:3000',
                'privacy' => 'accepted',
            ]);

            $duplicate = ContactSubmission::where('email', $validated['email'])
                ->where('message', $validated['message'])
                ->where('created_at', '>=', now()->subMinute())
                ->exists();

            if ($duplicate) {
                return response()->json(['status' => 'warning', 'title' => 'Already received', 'message' => 'This message was submitted recently. Please wait a minute before trying again.', 'icon' => 'warning'], 422);
            }

            $location = IpCountryResolver::resolve($request);
            $contact = DB::transaction(fn () => ContactSubmission::create([
                'fullname' => $validated['fullname'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'ip_address' => $location['ip'],
                'country' => $location['country'],
            ]));

            try {
                Mail::send('emails.contact-admin', compact('contact'), function ($mail) use ($contact) {
                    $mail->to('website@deveoninc.com', 'Deveon Inc Website Team')->replyTo($contact->email, $contact->fullname)->subject('New website enquiry: '.$contact->subject);
                });
                Mail::send('emails.contact-confirmation', compact('contact'), function ($mail) use ($contact) {
                    $mail->to($contact->email, $contact->fullname)->subject('We received your message — Deveon Inc');
                });
            } catch (\Throwable $mailError) {
                Log::error('Contact email delivery failed', ['contact_id' => $contact->id, 'message' => $mailError->getMessage()]);
            }

            return response()->json(['status' => 'success', 'title' => 'Message received!', 'message' => 'Thank you for contacting Deveon Inc. A confirmation has been sent to your email, and our team will respond shortly.', 'icon' => 'success']);
        } catch (ValidationException $e) {
            return response()->json(['status' => 'error', 'title' => 'Please check the form', 'message' => collect($e->errors())->flatten()->first() ?: 'Please check your details and try again.', 'errors' => $e->errors(), 'icon' => 'error'], 422);
        } catch (\Throwable $e) {
            Log::error('Contact form submission failed', ['message' => $e->getMessage()]);
            return response()->json(['status' => 'error', 'title' => 'Unable to send', 'message' => 'We could not submit your message right now. Please try again shortly.', 'icon' => 'error'], 500);
        }
    }
}
