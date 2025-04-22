<?php

// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->product_id;
        $quantity = $request->quantity;
        $sessionId = session()->getId();  // الحصول على session_id الخاصة بالمستخدم

        // تحقق من إذا كان المنتج موجودًا بالفعل في السلة
        $cart = Cart::where('product_id', $productId)
                    ->where('session_id', $sessionId)
                    ->first();

        if ($cart) {
            // إذا كان المنتج موجودًا في السلة، قم بتحديث الكمية
            $cart->quantity += $quantity;
            $cart->save();
        } else {
            // إذا كان المنتج غير موجود، قم بإضافته
            Cart::create([
                'product_id' => $productId,
                'quantity' => $quantity,
                'session_id' => $sessionId
            ]);
        }

        return redirect()->route('cart.show');
    }

    public function showCart()
    {
        $sessionId = session()->getId();
        $cartItems = Cart::with('product')
            ->where('session_id', $sessionId)
            ->get();
    
        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
    
        return view('cart.index', compact('cartItems', 'total'));
    }

    
    public function getCart()
    {
        $carts = Cart::with('product')->get();  // أو أي طريقة لجلب البيانات حسب الحاجة
        return response()->json(['carts' => $carts]);
    }

    public function updateQuantity(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->update(['quantity' => $request->input('quantity')]);
    
        return redirect()->back();
    }
    
    public function removeItem($id)
    {
        Cart::findOrFail($id)->delete();
        return redirect()->back();
    }
}