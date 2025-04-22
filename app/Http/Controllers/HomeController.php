<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application homepage with products and testimonials.
     */
    public function index()
    {
        $products = Product::where('in_stock', true)
                          ->where('quantity', '>', 0)
                          ->get();
        
        $testimonials = Testimonial::all();
        
        return view('welcome', compact('products', 'testimonials'));
    }
    
    public function perfume() {
        return view('rosefume');
    }
} 