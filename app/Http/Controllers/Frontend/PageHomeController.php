<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Slider;
use App\Models\About;

class PageHomeController extends Controller
{
    public function index()
    {
        $slider = Slider::where('status', '1')->first();

        $about = About::where('id', 1)->first();

        return view('frontend.pages.index', compact('slider', 'about'));
    }
}
