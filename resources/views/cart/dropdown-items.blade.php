<div class="cart-items-container">
    @foreach($cartItems as $item)
        <div class="cart-item">
            <img src="{{ str_replace('storage/app/public/', 'storage/', $item->product->getFirstMediaUrl('product_images')) }}" alt="{{ $item->product->name }}">
            <div class="item-details">
                <h5>{{ $item->product->name }}</h5>
                <p>{{ $item->quantity }} × {{ number_format($item->product->discounted_price ?? $item->product->price, 2) }} ج.م</p>
            </div>
        </div>
    @endforeach
</div>
<div class="cart-total">
    <span>الإجمالي:</span>
    <span>{{ number_format($total, 2) }} ج.م</span>
</div>
<div class="cart-actions">
    <a href="{{ route('cart.index') }}" class="th-btn">عرض السلة</a>
    <button onclick="closeCartDropdown()" class="th-btn">متابعة التسوق</button>
</div>