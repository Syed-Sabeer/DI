<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\CareerApplication;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Throwable;

class CareerApplicationController extends Controller
{
    public function store(Request $request, Career $career): JsonResponse
    {
        if (! $career->visibility || ($career->application_deadline && $career->application_deadline->lt(today()))) {
            return response()->json([
                'icon' => 'warning',
                'title' => 'Applications are closed',
                'message' => 'This position is no longer accepting applications.',
            ], 422);
        }

        try {
            $validated = $request->validate([
                'submission_token' => ['required', 'uuid'],
                'first_name' => ['required', 'string', 'max:100'],
                'last_name' => ['required', 'string', 'max:100'],
                'email' => ['required', 'email:rfc', 'max:255'],
                'phone' => ['required', 'string', 'max:30'],
                'linkedin_url' => ['nullable', 'url:http,https', 'max:255'],
                'github_url' => ['nullable', 'url:http,https', 'max:255'],
                'current_workplace' => ['nullable', 'string', 'max:255'],
                'current_position' => ['nullable', 'string', 'max:255'],
                'years_experience' => ['required', 'string', 'max:100'],
                'current_salary' => ['nullable', 'string', 'max:100'],
                'expected_salary' => ['nullable', 'string', 'max:100'],
                'address' => ['required', 'string', 'max:500'],
                'country' => ['required', 'string', 'max:120'],
                'state' => ['required', 'string', 'max:120'],
                'city' => ['required', 'string', 'max:120'],
                'postal_code' => ['required', 'string', 'max:30'],
                'resume' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
                'cover_letter' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
                'privacy' => ['accepted'],
            ]);
        } catch (ValidationException $exception) {
            return response()->json([
                'icon' => 'error',
                'title' => 'Please check your application',
                'message' => collect($exception->errors())->flatten()->first(),
                'errors' => $exception->errors(),
            ], 422);
        }

        if (CareerApplication::where('submission_token', $validated['submission_token'])->exists()) {
            return response()->json([
                'icon' => 'success',
                'title' => 'Application already received',
                'message' => 'Your application for '.$career->job_title.' was already submitted successfully.',
            ]);
        }

        $duplicate = CareerApplication::where('career_id', $career->id)
            ->where('email', $validated['email'])
            ->where('created_at', '>=', now()->subMinutes(10))
            ->exists();

        if ($duplicate) {
            return response()->json([
                'icon' => 'warning',
                'title' => 'Application already received',
                'message' => 'We recently received an application from this email for the same role.',
            ], 422);
        }

        $resumePath = null;
        $coverLetterPath = null;

        try {
            $resumePath = $request->file('resume')->store('career-applications/resumes');
            if ($request->hasFile('cover_letter')) {
                $coverLetterPath = $request->file('cover_letter')->store('career-applications/cover-letters');
            }

            $application = DB::transaction(fn () => CareerApplication::create([
                ...collect($validated)->except(['resume', 'cover_letter', 'privacy'])->all(),
                'career_id' => $career->id,
                'resume_path' => $resumePath,
                'resume_name' => $request->file('resume')->getClientOriginalName(),
                'cover_letter_path' => $coverLetterPath,
                'cover_letter_name' => $request->file('cover_letter')?->getClientOriginalName(),
                'ip_address' => $request->ip(),
            ]));
        } catch (Throwable $exception) {
            if ($resumePath) Storage::delete($resumePath);
            if ($coverLetterPath) Storage::delete($coverLetterPath);

            if ($exception instanceof QueryException
                && CareerApplication::where('submission_token', $validated['submission_token'])->exists()) {
                return response()->json([
                    'icon' => 'success',
                    'title' => 'Application already received',
                    'message' => 'Your application for '.$career->job_title.' was already submitted successfully.',
                ]);
            }

            Log::error('Career application could not be saved.', ['exception' => $exception]);

            return response()->json([
                'icon' => 'error',
                'title' => 'Unable to submit',
                'message' => 'Your application could not be saved. Please try again shortly.',
            ], 500);
        }

        try {
            Mail::send('emails.career-application-admin', compact('application', 'career'), function ($message) use ($application, $career) {
                $message->to('careers@deveoninc.com', 'Deveon Inc Careers')
                    ->replyTo($application->email, $application->first_name.' '.$application->last_name)
                    ->subject('New application: '.$career->job_title)
                    ->attach(Storage::path($application->resume_path), ['as' => $application->resume_name]);

                if ($application->cover_letter_path) {
                    $message->attach(Storage::path($application->cover_letter_path), ['as' => $application->cover_letter_name]);
                }
            });

            Mail::send('emails.career-application-confirmation', compact('application', 'career'), function ($message) use ($application, $career) {
                $message->to($application->email, $application->first_name.' '.$application->last_name)
                    ->subject('We received your application for '.$career->job_title);
            });
        } catch (Throwable $exception) {
            Log::error('Career application email failed after the application was saved.', [
                'application_id' => $application->id,
                'exception' => $exception,
            ]);
        }

        return response()->json([
            'icon' => 'success',
            'title' => 'Application received!',
            'message' => 'Thank you, '.$application->first_name.'. Your application for '.$career->job_title.' has been submitted successfully.',
        ], 201);
    }
}
