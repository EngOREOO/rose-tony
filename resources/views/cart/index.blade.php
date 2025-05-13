@extends('layouts.app')

@section('content')
<div class="breadcumb-wrapper" data-bg-src="{{ asset('website/assets/img/bg/breadcumb-bg.jpg') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">سلة المشتريات</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                <li>السلة</li>
            </ul>
        </div>
    </div>
</div>

<div class="cart-area space-top space-extra-bottom">
    <div class="container">
    <div class="cart-header">
        <h3>سلة المشتريات</h3>
        <a href="{{ url()->current() }}">✖</a>
    </div>

    @if($cartItems->isNotEmpty())
        @foreach($cartItems as $item)
            <div class="cart-item">
                <div class="item-details">
                    <div class="item-top">
                        <div>{{ $item['name'] }}</div>
                        <a href="{{ route('cart.remove', $item['id']) }}" class="remove-btn">×</a>
                    </div>
                    <div>{{ number_format($item['price'] * $item['quantity'], 2) }} ج.م</div>
                    <form method="POST" action="{{ route('cart.update', $item['id']) }}">
                        @csrf
                        <div class="item-quantity">
                            <button type="submit" name="quantity" value="{{ $item['quantity'] - 1 }}">-</button>
                            <span>{{ $item['quantity'] }}</span>
                            <button type="submit" name="quantity" value="{{ $item['quantity'] + 1 }}">+</button>
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
        @if($cartItems->isNotEmpty())
            <div class="table-responsive">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>المنتج</th>
                            <th>السعر</th>
                            <th>الكمية</th>
                            <th>المجموع</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td class="cart-product">
                                    <div class="cart-product-thumb">
                                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                                    </div>
                                    <div class="cart-product-name">
                                        <h6><a href="{{ route('shop.product', $item['slug']) }}">{{ $item['name'] }}</a></h6>
                                    </div>
                                </td>
                                <td class="cart-product-price">{{ number_format($item['price'], 2) }} ج.م</td>
                                <td class="cart-quantity">
                                    <form method="POST" action="{{ route('cart.update', $item['id']) }}" class="quantity">
                                        @csrf
                                        <button type="submit" name="quantity" value="{{ $item['quantity'] - 1 }}" class="quantity-minus"><i class="far fa-chevron-down"></i></button>
                                        <input type="number" class="qty-input" value="{{ $item['quantity'] }}" readonly>
                                        <button type="submit" name="quantity" value="{{ $item['quantity'] + 1 }}" class="quantity-plus"><i class="far fa-chevron-up"></i></button>
                                    </form>
                                </td>
                                <td class="cart-product-subtotal">{{ number_format($item['price'] * $item['quantity'], 2) }} ج.م</td>
                                <td class="cart-remove">
                                    <a href="{{ route('cart.remove', $item['id']) }}" class="remove-btn" onclick="return confirm('هل أنت متأكد من حذف هذا المنتج؟')">
                                        <i class="far fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row justify-content-end">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="cart-total">
                        <h4 class="title">ملخص السلة</h4>
                        <table>
                            <tbody>
                                <tr>
                                    <th>المجموع الفرعي</th>
                                    <td>{{ number_format($total, 2) }} ج.م</td>
                                </tr>
                                <tr>
                                    <th>المجموع الكلي</th>
                                    <td class="total">{{ number_format($total, 2) }} ج.م</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('checkout') }}" class="th-btn">المتابعة للدفع</a>
                    </div>
                </div>
            </div>
        @else
            <div class="empty-cart text-center">
                <h3>سلة المشتريات فارغة</h3>
                <p>لم تقم بإضافة أي منتجات للسلة بعد.</p>
                <a href="{{ route('shop.index') }}" class="th-btn">تسوق الآن</a>
            </div>
        @endif
    </div>
</div>
@endsection

@push('styles')
<style>
.cart-area {
    padding: 40px 0;
}
.cart-table {
    width: 100%;
    margin-bottom: 30px;
}
.cart-table th {
    padding: 15px;
    text-align: right;
    border-bottom: 1px solid #eee;
}
.cart-product {
    display: flex;
    align-items: center;
    gap: 15px;
}
.cart-product-thumb img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 4px;
}
.cart-product-name h6 {
    margin: 0;
}
.cart-product-name a {
    color: inherit;
    text-decoration: none;
}
.cart-remove .remove-btn {
    color: #ff4444;
    text-decoration: none;
}
.cart-total {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 8px;
}
.cart-total .title {
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
}
.cart-total table {
    width: 100%;
}
.cart-total th, .cart-total td {
    padding: 10px 0;
}
.cart-total .total {
    font-size: 1.2em;
    font-weight: bold;
}
.empty-cart {
    padding: 50px 0;
}
</style>
@endpush
