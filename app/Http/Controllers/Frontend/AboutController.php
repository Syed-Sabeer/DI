<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\Log;

class AboutController extends Controller
{
    public function index(){
        return view("frontend.about");
    }

    
}
