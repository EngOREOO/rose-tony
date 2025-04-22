<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Brand;
use App\Models\Testimonial;

class AboutController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        $brands = Brand::all();
        $aboutUs = AboutUs::first();

        return view('website.about', compact('testimonials', 'brands', 'aboutUs'));
    }
}