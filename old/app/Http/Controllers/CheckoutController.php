<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    /**
     * Show the checkout form for a specific product.
     */
    public function showCheckout($productId)
    {
        $product = Product::findOrFail($productId);
        
        if (!$product->in_stock || $product->quantity <= 0) {
            return redirect()->back()->with('error', 'Sorry, this product is out of stock.');
        }
        
        return view('checkout', compact('product'));
    }
    
    /**
     * Process the checkout form.
     */
    public function processCheckout(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        
        if (!$product->in_stock || $product->quantity <= 0) {
            return redirect()->back()->with('error', 'Sorry, this product is out of stock.');
        }
        
        $validator = Validator::make($request->all(), [
            // 'email' => 'required|email',
            'first_name' => 'required|string|max:255',
            // 'last_name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'street_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            // 'postal_code' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'color' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $order = new Order();
        $order->product_id = $product->id;
        $order->email = $request->email;
        $order->first_name = $request->first_name;
        // $order->last_name = $request->last_name;
        $order->country = $request->country;
        $order->street_address = $request->street_address;
        $order->apartment = $request->apartment;
        $order->city = $request->city;
        $order->region = $request->region;
        // $order->postal_code = $request->postal_code;
        $order->phone = $request->phone;
        $order->color = $request->color;
        $order->notes = $request->notes;
        $order->payment_method = 'cash_on_delivery'; // Default to cash on delivery
        $order->status = 'pending';
        $order->total = $product->price;
        $order->save();
        
        // Update product quantity
        $product->quantity = $product->quantity - 1;
        if ($product->quantity <= 0) {
            $product->in_stock = false;
        }
        $product->save();
        
        return redirect()->route('order.confirmation', $order->id);
    }
    
    /**
     * Show the order confirmation page.
     */
    public function showConfirmation($orderId)
    {
        $order = Order::with('product')->findOrFail($orderId);
        return view('confirmation', compact('order'));
    }
}
