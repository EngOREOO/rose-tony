<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Testimonial;
use App\Models\HomeSetting;
use App\Models\HomeCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application homepage with products and testimonials.
     */
    public function index()
    {
        // Fetch home categories and their active products
        $categories = HomeCategory::with(['products' => function($query) {
            $query->where('in_stock', true)
                  ->where('quantity', '>', 0)
                  ->with(['media', 'reviews']);
        }])->get();
        
        // Get all testimonial images
        $testimonialImages = Testimonial::whereHas('media', function($query) {
            $query->where('collection_name', 'testimonial_images');
        })->with(['media' => function($query) {
            $query->where('collection_name', 'testimonial_images');
        }])->get();

        // Get all main testimonial images
        $mainTestimonialImages = \Spatie\MediaLibrary\MediaCollections\Models\Media::where('collection_name', 'main_testimonial_image')
            ->where('model_type', 'App\Models\Testimonial')
            ->orderBy('id', 'desc')
            ->get();

        $blogs = Blog::where('is_active', true)
                    ->orderBy('created_at', 'desc')
                    ->take(3)
                    ->get();
                         
        $homeSetting = HomeSetting::firstOrCreate([], [
            'about_subtitle' => 'About The Coffee',
            'about_title' => 'We care about the quality of our products',
            'about_description' => 'Drinking coffee is one of the best global things you do each days here i can spend a long and comfortable time with this workspace facilities',
            'about_button_text' => 'Purchase now',
            'about_button_link' => 'contact.html',
            'about_features' => [
                [
                    'title' => 'Active Community',
                    'text' => 'You can reach out whenever you want',
                ],
                [
                    'title' => 'Premium Quality',
                    'text' => 'A premium quality coffee is what our customers deserve',
                ],
                [
                    'title' => 'The Organic Products',
                    'text' => 'We worked a lot to make a great experience',
                ],
                [
                    'title' => 'The Best Materials',
                    'text' => 'Our product is made by premium materials',
                ],
            ]
        ]);
        
        return view('website.home', compact('testimonialImages', 'mainTestimonialImages', 'homeSetting', 'categories', 'blogs'));
    }
    
    public function perfume() {
        return view('rosefume');
    }
} 