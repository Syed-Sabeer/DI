<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\CareerApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminCareerApplicationController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->validate([
            'search' => ['nullable', 'string', 'max:255'],
            'career_id' => ['nullable', 'integer', 'exists:careers,id'],
            'date_from' => ['nullable', 'date'],
            'date_to' => ['nullable', 'date'],
            'sort' => ['nullable', 'in:newest,oldest'],
        ]);

        $applications = CareerApplication::query()
            ->with('career:id,job_title')
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = trim($request->string('search'));
                $query->where(function ($query) use ($search) {
                    $query->where('first_name', 'like', "%{$search}%")
                        ->orWhere('last_name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhere('city', 'like', "%{$search}%")
                        ->orWhere('country', 'like', "%{$search}%")
                        ->orWhereHas('career', fn ($career) => $career->where('job_title', 'like', "%{$search}%"));
                });
            })
            ->when($request->filled('career_id'), fn ($query) => $query->where('career_id', $request->integer('career_id')))
            ->when($request->filled('date_from'), fn ($query) => $query->whereDate('created_at', '>=', $request->date_from))
            ->when($request->filled('date_to'), fn ($query) => $query->whereDate('created_at', '<=', $request->date_to))
            ->orderBy('created_at', ($filters['sort'] ?? 'newest') === 'oldest' ? 'asc' : 'desc')
            ->paginate(10)
            ->withQueryString();

        $careers = Career::query()->whereHas('applications')->orderBy('job_title')->get(['id', 'job_title']);

        return view('admin.submissions.career-applications.index', compact('applications', 'careers'));
    }

    public function download(CareerApplication $application, string $document): StreamedResponse
    {
        abort_unless(in_array($document, ['resume', 'cover-letter'], true), 404);

        $path = $document === 'resume' ? $application->resume_path : $application->cover_letter_path;
        $name = $document === 'resume' ? $application->resume_name : $application->cover_letter_name;
        abort_unless($path && Storage::exists($path), 404, 'Document not found.');

        return Storage::download($path, $name);
    }

    public function destroy(CareerApplication $application)
    {
        Storage::delete(array_filter([$application->resume_path, $application->cover_letter_path]));
        $application->delete();

        return back()->with('success', 'Career application deleted successfully.');
    }
}
