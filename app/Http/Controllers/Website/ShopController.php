<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::select('id', 'name', 'slug', 'price', 'discounted_price')
            ->whereNotNull('slug'); // Ensure we only get products with slugs

        // Handle sorting
        if ($request->has('orderby')) {
            switch ($request->orderby) {
                case 'popularity':
                    $query->withCount('orders')->orderBy('orders_count', 'desc');
                    break;
                case 'rating':
                    $query->orderBy('rating', 'desc');
                    break;
                case 'date':
                    $query->latest();
                    break;
                case 'price':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price-desc':
                    $query->orderBy('price', 'desc');
                    break;
                default:
                    $query->latest();
            }
        } else {
            $query->latest();
        }

        // Handle category filter
        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('id', $request->category);
            });
        }

        // Handle search
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Get products with pagination
        $products = $query->paginate(15);

        // Get sizes with product counts
        $sizes = Product::whereNotNull('size')
            ->select('size')
            ->selectRaw('count(*) as count')
            ->groupBy('size')
            ->pluck('count', 'size')
            ->toArray();

        // Get categories with product counts
        $categories = Category::withCount('products')
            ->having('products_count', '>', 0)
            ->orderBy('name')
            ->get();

        return view('website.shop', compact('products', 'sizes', 'categories'));
    }

    public function show(Product $product)
    {
        // Eager load media for the current product
        $product->load(['media']);
        
        // Get paginated reviews
        $reviews = $product->reviews()
            ->where('status', 'approved')
            ->latest()
            ->paginate(4);
        
        // Get related products if any exist
        $relatedProducts = collect();
        if (!empty($product->related_products)) {
            $relatedProducts = Product::whereIn('id', $product->related_products)
                ->with('media')
                ->get();
        }
        
        return view('website.product', compact('product', 'relatedProducts', 'reviews'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_slug' => 'required|exists:products,slug',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::where('slug', $request->product_slug)->firstOrFail();
        
        $cart = session()->get('cart_items', []);
        
        // Add or update product in cart
        $cart[$product->id] = [
            'id' => $product->id,
            'slug' => $product->slug,
            'name' => $product->name,
            'price' => $product->discounted_price ?? $product->price,
            'quantity' => $request->quantity,
            'image' => $product->getFirstMediaUrl('product_images'),
        ];
        
        session()->put('cart_items', $cart);
        
        // Update cart totals
        $this->updateCartTotals();
        
        return response()->json([
            'success' => true,
            'message' => 'تم إضافة المنتج للسلة بنجاح',
            'cart_count' => count($cart),
            'cart_total' => $this->calculateCartTotal($cart)
        ]);
    }

    /**
     * Remove a product from the cart
     */
    public function removeFromCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $cart = session()->get('cart_items', []);
        
        if (isset($cart[$request->product_id])) {
            unset($cart[$request->product_id]);
            session()->put('cart_items', $cart);
            
            // Update cart totals
            $this->updateCartTotals();
            
            return response()->json([
                'success' => true,
                'message' => 'تم إزالة المنتج من السلة',
                'cart_count' => count($cart),
                'cart_total' => $this->calculateCartTotal($cart)
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'المنتج غير موجود في السلة'
        ], 404);
    }

    /**
     * Calculate cart total
     */
    private function calculateCartTotal($cart)
    {
        return collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });
    }

    /**
     * Update cart session totals
     */
    private function updateCartTotals()
    {
        $cart = session()->get('cart_items', []);
        session()->put('cart_count', count($cart));
        session()->put('cart_total', $this->calculateCartTotal($cart));
    }

    public function addToWishlist(Request $request)
    {
        $request->validate([
            'product_slug' => 'required|exists:products,slug'
        ]);

        $product = Product::where('slug', $request->product_slug)->firstOrFail();
        
        // Here you would typically add to wishlist using your wishlist implementation
        // For example, using a Wishlist model or session
        
        return response()->json([
            'success' => true,
            'message' => 'تم إضافة المنتج للمفضلة بنجاح'
        ]);
    }

    public function quickView(Product $product)
    {
        $product->load('media');
        
        return response()->json([
            'success' => true,
            'product' => [
                'name' => $product->name,
                'price' => number_format($product->price, 2),
                'discounted_price' => $product->discounted_price ? number_format($product->discounted_price, 2) : null,
                'description' => $product->description,
                'image' => $product->getFirstMediaUrl('product_images'),
            ]
        ]);
    }
}