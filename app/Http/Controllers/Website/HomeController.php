<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\HomeSetting;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        // Get homepage settings
        $settings = HomeSetting::firstOrCreate([]);

        // Get products for different sections
        $products = Product::with('media')
            ->where('in_stock', true)
            ->latest()
            ->take(12)
            ->get();

        $featuredProducts = Product::with('media')
            ->where('in_stock', true)
            ->inRandomOrder()
            ->take(8)
            ->get();

        $newProducts = Product::with('media')
            ->where('in_stock', true)
            ->latest()
            ->take(8)
            ->get();

        $saleProducts = Product::with('media')
            ->where('in_stock', true)
            ->whereColumn('discounted_price', '<', 'price')
            ->whereNotNull('discounted_price')
            ->take(8)
            ->get();

        return view('website.home', compact(
            'settings',
            'products',
            'featuredProducts',
            'newProducts',
            'saleProducts'
        ));
    }
}