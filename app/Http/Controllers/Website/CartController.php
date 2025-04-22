<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        $cartItems = session()->get('cart', []);
        $products = Product::whereIn('id', array_keys($cartItems))->get();

        $total = $products->sum(function ($product) use ($cartItems) {
            return $product->price * $cartItems[$product->id]['quantity'];
        });

        return view('website.cart', compact('products', 'cartItems', 'total'));
    }

    public function add(Product $product): RedirectResponse
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);
        
        return back()->with('success', 'Product added to cart successfully.');
    }

    public function remove(Product $product): RedirectResponse
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Product removed from cart successfully.');
    }

    public function update(Product $product, int $quantity): RedirectResponse
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = max(1, $quantity);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Cart updated successfully.');
    }
}