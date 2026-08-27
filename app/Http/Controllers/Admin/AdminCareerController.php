<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminCareerController extends Controller
{
    public function index()
    {
        $careers = Career::latest()->paginate(20);
        return view('admin.crud.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.crud.careers.form', ['career' => new Career]);
    }

    public function store(Request $request)
    {
        Career::create($this->validated($request));
        return redirect()->route('admin.careers.index')->with('success', 'Career added successfully.');
    }

    public function edit(Career $career)
    {
        return view('admin.crud.careers.form', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $career->update($this->validated($request, $career));
        return redirect()->route('admin.careers.index')->with('success', 'Career updated successfully.');
    }

    public function destroy(Career $career)
    {
        $career->delete();
        return redirect()->route('admin.careers.index')->with('success', 'Career deleted successfully.');
    }

    public function toggleVisibility(Career $career)
    {
        $career->update(['visibility' => ! $career->visibility]);
        return back()->with('success', 'Career visibility updated.');
    }

    private function validated(Request $request, ?Career $career = null): array
    {
        $data = $request->validate([
            'job_title' => 'required|string|max:255',
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('careers')->ignore($career?->id)],
            'description' => 'required|string',
            'experience' => 'nullable|string|max:255',
            'education' => 'nullable|string|max:255',
            'salary_range' => 'nullable|string|max:255',
            'job_type' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'work_schedule' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'workweek' => 'nullable|string|max:255',
            'application_deadline' => 'nullable|date',
            'responsibilities_description' => 'nullable|string',
            'responsibilities_points' => 'nullable|array',
            'responsibilities_points.*' => 'nullable|string|max:1000',
            'qualifications_description' => 'nullable|string',
            'qualifications_points' => 'nullable|array',
            'qualifications_points.*' => 'nullable|string|max:1000',
            'experience_description' => 'nullable|string',
            'experience_points' => 'nullable|array',
            'experience_points.*' => 'nullable|string|max:1000',
            'visibility' => 'nullable|boolean',
        ]);

        foreach (['responsibilities_points', 'qualifications_points', 'experience_points'] as $field) {
            $data[$field] = array_values(array_filter($data[$field] ?? [], fn ($point) => trim((string) $point) !== ''));
        }
        $data['visibility'] = $request->boolean('visibility');
        return $data;
    }
}
