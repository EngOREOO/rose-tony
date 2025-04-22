<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'comment' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ], [
            'name.required' => 'الرجاء إدخال اسمك',
            'name.max' => 'الاسم طويل جداً',
            'comment.required' => 'الرجاء كتابة تعليقك',
            'comment.max' => 'التعليق طويل جداً',
            'rating.required' => 'الرجاء اختيار تقييمك',
            'rating.min' => 'التقييم يجب أن يكون بين 1 و 5 نجوم',
            'rating.max' => 'التقييم يجب أن يكون بين 1 و 5 نجوم',
        ]);

        $validated['status'] = 'pending';
        
        $product->reviews()->create($validated);

        return redirect()->back()->with('success', 'شكراً لك على تقييمك! سيتم مراجعة التعليق قبل نشره.');
    }
}