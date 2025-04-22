<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function show(string $slug): View
    {
        $product = Product::where('slug', $slug)
            ->with(['media', 'productReviews'])
            ->firstOrFail();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->with('media')
            ->take(4)
            ->get();

        return view('website.product', compact('product', 'relatedProducts'));
    }
}