<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCartItems()
    {
        $cartItems = Cart::where('session_id', session()->getId())
                        ->with('product')
                        ->get();
        
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->quantity * ($item->product->discounted_price ?? $item->product->price);
        }

        return view('cart.dropdown-items', compact('cartItems', 'total'));
    }

    public function addToCart(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $sessionId = session()->getId();
        
        $cartItem = Cart::firstOrNew([
            'session_id' => $sessionId,
            'product_id' => $product->id
        ]);

        $quantity = $request->input('quantity', 1);
        $cartItem->quantity = $request->has('quantity') ?
            ($cartItem->exists ? $cartItem->quantity + $quantity : $quantity) :
            ($cartItem->exists ? $cartItem->quantity + 1 : 1);
        
        $cartItem->save();

        $cartCount = Cart::where('session_id', $sessionId)->sum('quantity');

        return response()->json([
            'success' => true,
            'cartCount' => $cartCount,
            'message' => 'تمت إضافة المنتج للسلة'
        ]);
    }
}

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