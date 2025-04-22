<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class WishlistController extends Controller
{
    public function index(): View
    {
        $wishlistItems = session()->get('wishlist', []);
        $products = Product::whereIn('id', array_keys($wishlistItems))->get();

        return view('website.wishlist', compact('products'));
    }

    public function add(Product $product): RedirectResponse
    {
        $wishlist = session()->get('wishlist', []);

        if (!isset($wishlist[$product->id])) {
            $wishlist[$product->id] = true;
            session()->put('wishlist', $wishlist);
            return back()->with('success', 'تمت إضافة المنتج إلى قائمة الرغبات بنجاح.');
        }

        return back()->with('info', 'المنتج موجود بالفعل في قائمة الرغبات الخاصة بك.');
    }

    public function remove(Product $product): RedirectResponse
    {
        $wishlist = session()->get('wishlist', []);

        if (isset($wishlist[$product->id])) {
            unset($wishlist[$product->id]);
            session()->put('wishlist', $wishlist);
        }

        return back()->with('success', 'تمت إزالة المنتج من قائمة الرغبات بنجاح.');
    }
}