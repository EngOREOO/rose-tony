<div class="cart-sidebar @if(request()->get('show_cart')) opened @endif">
    <div class="cart-header">
        <h3>سلة المشتريات</h3>
        <a href="{{ url()->current() }}">✖</a>
    </div>

    @if($cartItems->count())
        @foreach($cartItems as $item)
            <div class="cart-item">
                <div class="item-details">
                    <div class="item-top">
                        <div>{{ $item->product->name }}</div>
                        <a href="{{ route('cart.remove', $item->id) }}" class="remove-btn">×</a>
                    </div>
                    <div>{{ $item->product->price * $item->quantity }} ج.م</div>
                    <form method="POST" action="{{ route('cart.update', $item->id) }}">
                        @csrf
                        <div class="item-quantity">
                            <button type="submit" name="quantity" value="{{ $item->quantity - 1 }}">-</button>
                            <span>{{ $item->quantity }}</span>
                            <button type="submit" name="quantity" value="{{ $item->quantity + 1 }}">+</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach

        <div class="cart-footer">
            <strong>المجموع: {{ $total }} جنيه</strong>
            <a href="/checkout" class="btn btn-success">التوجه إلى الدفع</a>
        </div>
    @else
        <p>لا توجد منتجات حالياً في السلة.</p>
    @endif
</div>
