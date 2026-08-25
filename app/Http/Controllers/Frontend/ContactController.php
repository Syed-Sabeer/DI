<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use App\Models\Contact;
use App\Models\ContactCmsPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Support\IpCountryResolver;

class ContactController extends Controller
{
    public function index(){
        $contact_details = ContactCmsPage::first();
        return view("frontend.contact", compact('contact_details'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'fullname' => 'required|string|max:255',
                'phone' => 'nullable|string|max:20',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string|max:1000',
            ]);

            // Check for duplicate submission within the last 30 seconds (very recent)
            $recentSubmission = ContactSubmission::where('email', $request->email)
                ->where('message', $request->message)
                ->where('created_at', '>=', now()->subSeconds(30))
                ->first();

            if ($recentSubmission) {
                Log::warning('Duplicate contact form submission detected:', [
                    'email' => $request->email,
                    'existing_id' => $recentSubmission->id,
                    'timestamp' => now()
                ]);
                
                return response()->json([
                    'status' => 'error',
                    'title' => 'Duplicate Submission!',
                    'message' => 'You have already submitted this message recently. Please wait before submitting again.',
                    'icon' => 'warning'
                ], 422);
            }

            Log::info('Processing contact form submission:', [
                'email' => $request->email,
                'subject' => $request->subject,
                'timestamp' => now()
            ]);

            $location = IpCountryResolver::resolve($request);

            // Use database transaction to ensure atomicity
            $contactSubmission = DB::transaction(function () use ($request, $location) {
                // Double-check for duplicates within the transaction
                $recentSubmission = ContactSubmission::where('email', $request->email)
                    ->where('message', $request->message)
                    ->where('created_at', '>=', now()->subSeconds(30))
                    ->lockForUpdate()
                    ->first();

                if ($recentSubmission) {
                    throw new \Exception('Duplicate submission detected within transaction');
                }

                return ContactSubmission::create([
                    'fullname' => $request->fullname,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'subject' => $request->subject,
                    'message' => $request->message,
                    'ip_address' => $location['ip'],
                    'country' => $location['country'],
                ]);
            });

            Log::info('Contact form submitted successfully:', ['id' => $contactSubmission->id]);

            try {
                Mail::send('emails.contact-admin', ['contact' => $contactSubmission], function ($mail) use ($contactSubmission) {
                    $mail->to('info@avrioglobal.io')->replyTo($contactSubmission->email, $contactSubmission->fullname)->subject('New contact enquiry: ' . $contactSubmission->subject);
                });
                Mail::send('emails.contact-confirmation', ['contact' => $contactSubmission], function ($mail) use ($contactSubmission) {
                    $mail->to($contactSubmission->email, $contactSubmission->fullname)->subject('We received your message — Avrio Global');
                });
            } catch (\Throwable $mailError) {
                Log::error('Contact email delivery failed', ['message' => $mailError->getMessage()]);
            }

            return response()->json([
                'status' => 'success',
                'title' => 'Success!',
                'message' => 'Thank you for your message! We will get back to you soon.',
                'icon' => 'success'
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Contact form validation error:', ['errors' => $e->errors()]);
            
            return response()->json([
                'status' => 'error',
                'title' => 'Validation Error!',
                'message' => 'Please check your input and try again.',
                'errors' => $e->errors(),
                'icon' => 'error'
            ], 422);

        } catch (\Exception $e) {
            Log::error('Contact form submission error:', ['message' => $e->getMessage()]);

            // Check if it's a duplicate submission error
            if (strpos($e->getMessage(), 'Duplicate submission detected') !== false) {
                return response()->json([
                    'status' => 'error',
                    'title' => 'Duplicate Submission!',
                    'message' => 'You have already submitted this message recently. Please wait before submitting again.',
                    'icon' => 'warning'
                ], 422);
            }

            return response()->json([
                'status' => 'error',
                'title' => 'Error!',
                'message' => 'Sorry, there was an error sending your message. Please try again.',
                'icon' => 'error'
            ], 500);
        }
    }
}
