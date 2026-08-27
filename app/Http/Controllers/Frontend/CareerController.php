<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Career;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::where('visibility', true)
            ->where(function ($query) {
                $query->whereNull('application_deadline')
                    ->orWhereDate('application_deadline', '>=', today());
            })
            ->latest()
            ->paginate(9);

        return view('frontend.career', compact('careers'));
    }

    public function show(string $slug)
    {
        $career = Career::where('visibility', true)->where('slug', $slug)->firstOrFail();
        return view('frontend.career-detail', compact('career'));
    }
}
