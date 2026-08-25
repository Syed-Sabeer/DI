<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\AboutSection;
use App\Models\HomeHeroSection;
use App\Models\Blog;
use App\Models\LiveVideo;
use App\Models\HeroSectionCrud;
use App\Models\CmsHomePage;
use App\Models\VisitStat;
use App\Models\Faq;
use App\Models\Testimonial;

class HomeController extends Controller
{




public function index()
{

    $stat = VisitStat::first();
    if (!$stat) {
        VisitStat::create(['home_visits' => 1]);
    } else {
        $stat->increment('home_visits');
    }

    $hero_section = HeroSectionCrud::where('visibility', 1)->get();
    $home_page = CmsHomePage::first();
    $faqs = Faq::where('visibility', 1)->get();
    $latestBlogs = Blog::where('visibility', 1)->latest()->take(3)->get();
    

    return view('frontend.index', compact('hero_section', 'home_page', 'faqs', 'latestBlogs'));
}

    public function contactStore(Request $request){

    try {
            $request->validate([
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'phone' => 'nullable|string|max:255',
                'message' => 'required|string',

            ]);

            $validatedData = $request->only(['firstname', 'lastname', 'email','phone','message']);

            Log::info('Validated Contact data:', $validatedData);

            $contact = Contact::create([
                'firstname' => $validatedData['firstname'],
                'lastname' => $validatedData['lastname'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'message' => $validatedData['message'],
            ]);

            Log::info('Contact created successfully:', ['id' => $contact->id]);

            return redirect()->route('home')->with('success', 'Contact Details Successfully');
        } catch (\Exception $e) {
            Log::error('Error while creating Contact:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }


}
