<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminNewsletterSubmissionController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->validate([
            'search' => 'nullable|string|max:255',
            'date_from' => 'nullable|date',
            'date_to' => 'nullable|date',
            'sort' => 'nullable|in:newest,oldest',
        ]);

        $newsletters = \App\Models\NewNewsletter::query()
            ->when($request->filled('search'), fn ($query) => $query->where('email', 'like', '%'.trim($request->string('search')).'%'))
            ->when($request->filled('date_from'), fn ($query) => $query->whereDate('created_at', '>=', $request->date_from))
            ->when($request->filled('date_to'), fn ($query) => $query->whereDate('created_at', '<=', $request->date_to))
            ->orderBy('created_at', ($filters['sort'] ?? 'newest') === 'oldest' ? 'asc' : 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.submissions.newsletters.index', compact('newsletters'));
    }
    public function destroy($id)
    {
        $newsletter = \App\Models\NewNewsletter::findOrFail($id);
        $newsletter->delete();

        return redirect()->back()->with('success', 'Newsletter deleted successfully.');
    }


}
