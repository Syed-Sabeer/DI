<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->validate([
            'search' => 'nullable|string|max:255',
            'date_from' => 'nullable|date',
            'date_to' => 'nullable|date',
            'sort' => 'nullable|in:newest,oldest',
        ]);

        $contacts = \App\Models\ContactSubmission::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = trim($request->string('search'));
                $query->where(function ($query) use ($search) {
                    $query->where('fullname', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhere('subject', 'like', "%{$search}%")
                        ->orWhere('message', 'like', "%{$search}%")
                        ->orWhere('country', 'like', "%{$search}%");
                });
            })
            ->when($request->filled('date_from'), fn ($query) => $query->whereDate('created_at', '>=', $request->date_from))
            ->when($request->filled('date_to'), fn ($query) => $query->whereDate('created_at', '<=', $request->date_to))
            ->orderBy('created_at', ($filters['sort'] ?? 'newest') === 'oldest' ? 'asc' : 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.submissions.contact.index', compact('contacts'));
    }
    public function destroy($id)
    {
        $contact = \App\Models\ContactSubmission::findOrFail($id);
        $contact->delete();

        return redirect()->back()->with('success', 'Contact deleted successfully.');
    }


}
