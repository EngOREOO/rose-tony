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
    // public function showCheckout($productId)
    // {
    //     $product = Product::findOrFail($productId);
        
    //     if (!$product->in_stock || $product->quantity <= 0) {
    //         return redirect()->back()->with('error', 'Sorry, this product is out of stock.');
    //     }
        
    //     return view('checkout', compact('product'));
    // }
    

    public function showCheckout(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $cart = session()->get('cart', []); // Keep if needed for summary on page

        // Optional: Calculate total price if you display it on this page
        $totalPrice = 0;
        foreach ($cart as $item) {
            // Ensure price and quantity exist to avoid errors
            if (isset($item['price']) && isset($item['quantity'])) {
                $totalPrice += $item['price'] * $item['quantity'];
            }
        }

        // Check stock *before* processing variations
        if (!$product->in_stock || $product->quantity <= 0) {
            // Using flash session for error messages is common
            return redirect()->back()->with('error', 'عذراً، هذا المنتج غير متوفر حالياً.');
        }

        // Handle source session regardless of variation type
        if ($request->has('source')) {
            session(['checkout_source' => $request->source]);
        }

        $variationType = $product->variation_type;
        $colors = null; // Initialize variation data to null
        $scents = null; // Initialize variation data to null

        // --- Process Variations ---

        // Use 'color' consistently if that's what's in your DB
        if ($variationType === 'colors') { // <<< Use 'color' consistently
            // Decode colors list if it's a string, otherwise assume it's already an array/object
            $rawColors = is_string($product->colors_list) ? json_decode($product->colors_list, true) : $product->colors_list;

            // Check if decoding was successful and it's an array
            if (is_array($rawColors)) {
                // Define color mapping (Consider moving this to a config file or helper if large)
                 $colorMapping = [
                    'احمر'  => '#FF0000', // Standard Red
                    'بينك'  => '#FFC0CB', // Pink
                    'خوخي' => '#FFDAB9', // Peach Puff (Khokhi often translates to Peach)
                    'خوخ'  => '#FFA07A', // Light Salmon (often used for Peach color)
                    'أزرق'  => '#0000FF', // Blue
                    'أخضر'  => '#008000', // Green
                    'أصفر'  => '#FFFF00', // Yellow
                    // Add more mappings as needed
                ];

                $processedColors = [];
                foreach ($rawColors as $colorData) {
                    // Ensure the structure is as expected
                    if (isset($colorData['name'])) {
                        $colorName = trim($colorData['name']); // Trim whitespace
                        $hex = $colorMapping[$colorName] ?? '#000000'; // Default to black if not found

                        $processedColors[] = [
                            'name' => $colorName, // Store the clean name
                            'hex' => $hex        // Store the hex code
                        ];
                    }
                }
                $colors = $processedColors; // Assign the processed array
            }
        }
        elseif ($variationType === 'scents') {
            // Decode scents list
            $rawScents = is_string($product->scents_list) ? json_decode($product->scents_list, true) : $product->scents_list;
             if (is_array($rawScents)) {
                // You might want to process scents too if needed, otherwise just pass them
                $scents = $rawScents;
             }
        }

        // --- Return the View ---
        // Pass all potentially needed variables. The view will decide what to display.
        return view('checkout', compact(
            'product',
            'cart',         // If you show a cart summary
            'totalPrice',   // If you show a total price
            'variationType',// Pass the type for clarity in the view
            'colors',       // Will be the processed array or null
            'scents',        // Will be the array or null
            'request'
        ));
    }

     /** Optional: Helper function if you prefer it here instead of inline logic
      * Although pre-calculating in the main function is often cleaner.
      * @param string $colorName
      * @return string
     */
    /*
    private function getColorHexByName(string $colorName): string
    {
        $colorMapping = [
            'أحمر' => '#FF5733',
            'بينك' => '#FFC0CB',
            'خوخ' => '#FFA07A',
            // ... other colors
        ];
        return $colorMapping[trim($colorName)] ?? '#000000'; // Default to black
    }
    */

    


public function addToCart(Request $request, $productId)
{
    $product = Product::findOrFail($productId);

    $cart = session()->get('cart', []);

    if (isset($cart[$productId])) {
        $cart[$productId]['quantity']++;
    } else {
        $cart[$productId] = [
            "name" => $product->name,
            "price" => $product->price,
            "quantity" => 1,
            "image" => $product->getFirstMediaUrl('product_images'),
        ];
    }

    session()->put('cart', $cart);
    return redirect()->back()->with('success', 'تم إضافة المنتج إلى السلة');
}



public function update(Request $request, $id)
{
    $cart = session()->get('cart');

    if(isset($cart[$id])) {
        $cart[$id]['quantity'] = $request->quantity;
        session()->put('cart', $cart);
    }

    return redirect()->back()->with('success', 'تم تحديث الكمية');
}

public function remove($id)
{
    $cart = session()->get('cart');

    if(isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    return redirect()->back()->with('success', 'تم حذف المنتج');
}


function getColorHex($colorName) {
    $colorMapping = [
        'أحمر' => '#FF5733',
        'بينك' => '#FFC0CB',
        'خوخ' => '#FFA07A',
        'أزرق' => '#0000FF',
        'أخضر' => '#008000',
        'أصفر' => '#FFFF00',
        // أضف المزيد من الألوان هنا
    ];

    // إذا لم يوجد اللون في المصفوفة، يمكننا تعيين لون افتراضي
    return isset($colorMapping[$colorName]) ? $colorMapping[$colorName] : '#000000'; // اللون الافتراضي (أسود)
}

    
    /**
     * Process the checkout form.
     */
public function processCheckout(Request $request, $productId)
{
    // Find the product by ID
    $product = Product::findOrFail($productId);
    
    // Get the quantity from the request - ensure it's not null
    $orderedQuantity = $request->input('quantity');
    
    // Default to 1 if no valid quantity provided
    if(empty($orderedQuantity) || $orderedQuantity < 1) {
        $orderedQuantity = 1;
    }
    
    // Convert to integer to ensure proper type
    $orderedQuantity = (int)$orderedQuantity;
    
    // Check if the product is in stock and quantity is available
    if (!$product->in_stock || $product->quantity <= 0) {
        return redirect()->back()->with('error', 'Sorry, this product is out of stock.');
    }
    if ($orderedQuantity > $product->quantity) {
        return redirect()->back()->with('error', 'Sorry, not enough stock for this product.');
    }
    
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'first_name' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'street_address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'region' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'color' => 'nullable|string|max:255',
        'notes' => 'nullable|string',
        'quantity' => 'required|integer|min:1', // Ensure quantity is required and valid
    ]);
    
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Handle selected colors and quantities
    $selectedColors = [];
    if ($request->has('variations') && !empty($request->variations)) {
        foreach ($request->variations as $variation) {
            // تجاهل الألوان ذات الكمية صفر
            if ($variation['type'] === 'color' && isset($variation['quantity']) && $variation['quantity'] > 0) {
                $selectedColors[] = [
                    'color' => $variation['name'],
                    'quantity' => $variation['quantity']
                ];
            }
        }
    }

    // تحقق مما إذا كانت هناك ألوان صالحة
    $selectedColorsJson = !empty($selectedColors) ? json_encode($selectedColors) : null;

    // Create a new order
    $order = new Order();
    $order->product_id = $product->id;
    $order->email = $request->email;
    $order->first_name = $request->first_name;
    $order->country = $request->country;
    $order->street_address = $request->street_address;
    $order->apartment = $request->apartment;
    $order->city = $request->city;
    $order->region = $request->region;
    $order->phone = $request->phone;
    $order->notes = $request->notes;
    $order->payment_method = 'cash_on_delivery'; // Default to cash on delivery
    $order->status = 'pending';

    // Store the selected colors with their quantities if they are valid
    if ($selectedColorsJson) {
        $order->selected_colors = $selectedColorsJson;
    }
    
    // Set the ordered quantity explicitly
    $order->ordered_quantity = $orderedQuantity;

    // Calculate the total price based on quantity
    $order->total = $product->price * $orderedQuantity;

    $order->save();
    
    // Update product quantity after the order is placed
    $product->quantity -= $orderedQuantity;
    if ($product->quantity <= 0) {
        $product->in_stock = false;
    }
    $product->save();
    
    // Redirect to the order confirmation page
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
