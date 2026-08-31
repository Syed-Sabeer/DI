<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\NewNewsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\ValidationException;

class NewsletterSubscriptionController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|email:rfc|max:255',
            ]);

            $newsletter = NewNewsletter::firstOrCreate([
                'email' => strtolower(trim($validated['email'])),
            ]);

            if (! $newsletter->wasRecentlyCreated) {
                return response()->json([
                    'status' => 'info',
                    'icon' => 'info',
                    'title' => 'Already subscribed',
                    'message' => 'This email is already on our newsletter list. You will not receive duplicate subscriptions.',
                ]);
            }

            return response()->json([
                'status' => 'success',
                'icon' => 'success',
                'title' => 'You’re on the list!',
                'message' => 'Thanks for subscribing. We’ll share useful insights and company updates with you.',
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'icon' => 'error',
                'title' => 'Check your email',
                'message' => collect($e->errors())->flatten()->first() ?: 'Please enter a valid email address.',
                'errors' => $e->errors(),
            ], 422);
        }
    }

    public function confirmUnsubscribe(NewNewsletter $subscriber)
    {
        $confirmUrl = URL::signedRoute('newsletter.unsubscribe.confirm', [
            'subscriber' => $subscriber->getKey(),
        ]);

        return view('frontend.newsletter-unsubscribe-confirm', compact('subscriber', 'confirmUrl'));
    }

    public function destroy(NewNewsletter $subscriber)
    {
        $email = $subscriber->email;
        $subscriber->delete();

        return view('frontend.newsletter-unsubscribed', compact('email'));
    }

    public function oneClickUnsubscribe(NewNewsletter $subscriber)
    {
        $subscriber->delete();

        return response()->noContent();
    }

    public function resubscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:rfc|max:255',
        ]);

        $email = strtolower(trim($validated['email']));
        NewNewsletter::firstOrCreate(compact('email'));

        return view('frontend.newsletter-unsubscribed', [
            'email' => $email,
            'resubscribed' => true,
        ]);
    }
}
