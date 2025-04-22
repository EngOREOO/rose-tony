<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <title>الدفع - Rosmary Organic</title>
    
    
     <script>
        fbq('init', '{{ env('FACEBOOK_PIXEL_ID') }}');
    </script>



    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '551745431056767');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
             src="https://www.facebook.com/tr?id=551745431056767&ev=PageView&noscript=1"/>
    </noscript>
    
    
    <style>
        .btn-primary {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-primary:hover {
            background-color: #bb2d3b;
            border-color: #b02a37;
        }
        .btn-outline-primary {
            color: #dc3545;
            border-color: #dc3545;
        }
        .btn-outline-primary:hover {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .bg-primary {
            background-color: #dc3545 !important;
        }
        .text-primary {
            color: #dc3545 !important;
        }
        .form-check-input:checked {
            background-color: #dc3545;
            border-color: #dc3545;
        }
    </style>
    <style>
    .timer {
        text-align: center;
        padding: 8px;
        border-radius: 6px;
        background: transparent; 
        color: #333;
        font-size: 16px; 
        font-weight: bold;
        border: 1.5px solid #ddd; 
        min-width: 60px;
    }
    
    .time {
        font-size: 20px; 
        font-weight: bold;
        color: white;
        text-shadow: 1.5px 1.5px 3px rgba(0, 0, 0, 0.5); 
    }
    
    .timerTitle {
        font-size: 14px; 
        font-weight: bold;
        color: white;
    }
    
    .timeLabel {
        font-size: 12px; 
        color: #777; 
    }

    /* تصغير الحجم أكثر على شاشات الموبايل */
    @media (max-width: 768px) {
        .timer {
            font-size: 10px;
            min-width: 35px;
            padding: 3px;
            border-radius: 4px;
        }
        
        .time {
            font-size: 12px;
        }
        
        .timerTitle {
            font-size: 10px;
        }
        
        .timeLabel {
            font-size: 8px;
        }
    }
</style>

</head>

<body>
    <header>
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <a href="javascript:void(0);" id="toggleCartBtn">
    <svg class="e-font-icon-svg e-eicon-basket-solid" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg">
        <path d="M128 417H63C51 417 42 407 42 396S51 375 63 375H256L324 172C332 145 358 125 387 125H655C685 125 711 145 718 173L786 375H979C991 375 1000 384 1000 396S991 417 979 417H913L853 793C843 829 810 854 772 854H270C233 854 200 829 190 793L128 417ZM742 375L679 185C676 174 666 167 655 167H387C376 167 367 174 364 184L300 375H742ZM500 521V729C500 741 509 750 521 750S542 741 542 729V521C542 509 533 500 521 500S500 509 500 521ZM687 732L717 526C718 515 710 504 699 502 688 500 677 508 675 520L646 726C644 737 652 748 663 750 675 751 686 743 687 732ZM395 726L366 520C364 509 354 501 342 502 331 504 323 515 325 526L354 732C356 744 366 752 378 750 389 748 397 737 395 726Z"></path>
    </svg>
</a>

<div id="cartSidebar" class="cart-sidebar">
    <div class="cart-header">
        <h3>سلة المشتريات</h3>
        <button id="closeCartBtn">✖</button>
    </div>
    <div id="cartItems">لا توجد منتجات حالياً</div>
    <div class="cart-footer">
        <strong>المجموع: <span id="cartTotal">0</span> جنيه</strong>
    </div>
</div>

<!-- Overlay -->
<div id="overlay" class="overlay"></div>


<script>
function buyNow(productId, productName, productPrice, productImage) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Check if product already in cart
    let productIndex = cart.findIndex(item => item.id === productId);

    if (productIndex > -1) {
        cart[productIndex].quantity += 1;
    } else {
        cart.push({
            id: productId,
            name: productName,
            price: productPrice,
            image: productImage,
            quantity: 1
        });
    }

    // Save to localStorage
    localStorage.setItem('cart', JSON.stringify(cart));

    // Optional: تحديث واجهة السلة
    updateCart();

    // Redirect to checkout page
    window.location.href = `/checkout/${productId}?source=tint`;
}
</script>



<script>
// Function to toggle cart sidebar visibility
document.getElementById('toggleCartBtn').addEventListener('click', function() {
    document.getElementById('cartSidebar').classList.toggle('opened');
    document.getElementById('overlay').classList.toggle('opened');
});

// Close cart sidebar when overlay is clicked
document.getElementById('overlay').addEventListener('click', function() {
    document.getElementById('cartSidebar').classList.remove('opened');
    document.getElementById('overlay').classList.remove('opened');
});

// Function to add product to cart
function addToCart(productId, productName, productPrice, productImage) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    // Check if product is already in the cart
    let productIndex = cart.findIndex(item => item.id === productId);
    
    if (productIndex > -1) {
        // If product is already in the cart, increase its quantity
        cart[productIndex].quantity += 1;
    } else {
        // Add new product to cart
        cart.push({
            id: productId,
            name: productName,
            price: productPrice,
            image: productImage,
            quantity: 1
        });
    }

    // Save cart to localStorage
    localStorage.setItem('cart', JSON.stringify(cart));

    // Update cart UI
    updateCart();

    // Redirect to checkout page after a slight delay (optional)
    setTimeout(function() {
        window.location.href = '/checkout/' + productId;  // Modify this to your checkout page URL
    }, 500);  // 500 ms delay before redirecting
}

// Function to update cart UI
// Function to update cart UI
function updateCart() {
    const cartItems = document.getElementById('cartItems');
    const cartTotal = document.getElementById('cartTotal');
    
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    cartItems.innerHTML = '';
    let total = 0;

    cart.forEach(item => {
        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');

        // const img = document.createElement('img');
        // img.src = item.image;
        // img.alt = item.name;

        const itemDetails = document.createElement('div');
        itemDetails.classList.add('item-details');

        const itemTop = document.createElement('div');
        itemTop.classList.add('item-top');

        const itemName = document.createElement('div');
        itemName.textContent = item.name;

        const removeBtn = document.createElement('button');
        removeBtn.innerText = '×';
        removeBtn.classList.add('remove-btn');
        removeBtn.addEventListener('click', function() {
            cart = cart.filter(cartItem => cartItem.id !== item.id);
            saveCart(cart);
            updateCart();
        });

        itemTop.appendChild(itemName);
        itemTop.appendChild(removeBtn);

        const itemPrice = document.createElement('div');
        itemPrice.innerHTML = `${item.price} جنيه`;

        const itemQuantity = document.createElement('div');
        itemQuantity.classList.add('item-quantity');

        const decreaseBtn = document.createElement('button');
        decreaseBtn.innerText = '-';
        decreaseBtn.addEventListener('click', function() {
            if (item.quantity > 1) {
                item.quantity -= 1;
                saveCart(cart);
                updateCart();
            }
        });

        const quantityDisplay = document.createElement('span');
        quantityDisplay.innerText = item.quantity;

        const increaseBtn = document.createElement('button');
        increaseBtn.innerText = '+';
        increaseBtn.addEventListener('click', function() {
            item.quantity += 1;
            saveCart(cart);
            updateCart();
        });

        itemQuantity.appendChild(decreaseBtn);
        itemQuantity.appendChild(quantityDisplay);
        itemQuantity.appendChild(increaseBtn);

        itemDetails.appendChild(itemTop);
        itemDetails.appendChild(itemPrice);
        itemDetails.appendChild(itemQuantity);

        // cartItem.appendChild(img);
        cartItem.appendChild(itemDetails);
        cartItems.appendChild(cartItem);

        total += item.price * item.quantity;
    });

    cartTotal.textContent = total;
}


// Function to save updated cart to localStorage
function saveCart(cart) {
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Close cart button functionality
document.getElementById('closeCartBtn').addEventListener('click', function() {
    document.getElementById('cartSidebar').classList.remove('opened');
    document.getElementById('overlay').classList.remove('opened');
});

// Initialize cart on page load
document.addEventListener('DOMContentLoaded', updateCart);

</script>
<style>
/* Basic styling for the cart sidebar */
.cart-sidebar {
    display: none;
    position: fixed;
    top: 0;
    right: -100%;
    width: 380px;
    max-width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #ffffff 0%, #f9f9f9 100%);
    box-shadow: -5px 0 20px rgba(0, 0, 0, 0.1);
    padding: 25px;
    transition: right 0.4s ease, display 0.2s ease;
    z-index: 999;
    border-radius: 20px 0 0 20px;
    overflow-y: auto;
}

.cart-sidebar.opened {
    display: block;
    right: 0;
}

.overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
    z-index: 998;
}

.overlay.opened {
    display: block;
}

.cart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 2px solid #e0e0e0;
    padding-bottom: 15px;
    margin-bottom: 20px;
}

.cart-header h3 {
    font-size: 20px;
    font-weight: bold;
    color: #2c3e50;
}

#closeCartBtn {
    font-size: 22px;
    background: none;
    border: none;
    color: #e74c3c;
    cursor: pointer;
    transition: transform 0.3s ease;
}

#closeCartBtn:hover {
    transform: scale(1.2);
}

.cart-footer {
    font-size: 18px;
    font-weight: bold;
    text-align: center;
    margin-top: 25px;
    padding-top: 15px;
    border-top: 2px solid #e0e0e0;
    color: #34495e;
}

.cart-item {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    margin-bottom: 20px;
    border-bottom: 1px solid #ececec;
    padding-bottom: 10px;
}

.cart-item img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 8px;
}

.item-details {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.item-details div {
    font-size: 15px;
    color: #333;
}

.item-quantity {
    display: flex;
    align-items: center;
    gap: 10px;
}

.item-quantity button {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 8px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.item-quantity button:hover {
    background-color: #2980b9;
}

.remove-btn {
    background: none;
    border: none;
    color: #e74c3c;
    font-size: 20px;
    align-self: flex-start;
    cursor: pointer;
    margin-top: 5px;
    transition: transform 0.3s ease;
}

.remove-btn:hover {
    transform: scale(1.2);
}

.cart-item {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    margin-bottom: 20px;
    border-bottom: 1px solid #ececec;
    padding-bottom: 10px;
}

.cart-item img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 8px;
}

.item-details {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.item-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.item-top div {
    font-weight: bold;
    font-size: 16px;
    color: #2c3e50;
}

.remove-btn {
    background: none;
    border: none;
    color: #e74c3c;
    font-size: 18px;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.remove-btn:hover {
    transform: scale(1.2);
}

.item-quantity {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 5px;
}

.item-quantity button {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 8px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.item-quantity button:hover {
    background-color: #2980b9;
}



</style>
                <div>
                    <a href="{{ route('home') }}" class="btn btn-outline-primary" style="color: white">العودة إلى الرئيسية</a>
                </div>
                
                
                <div>
                    <img src="{{ asset('assets/images/logo.webp') }}" alt="Rosemary Organic Logo">
                </div>
                <div class="d-flex" id="timer">
                    <div class="timerTitle">
                        ينتهي العرض بعد
                    </div>
                    <div class="d-flex gap-2 flex-grow-1">
                        <div id="second" class="timer">
                            <div class="time"></div>
                            <div class="timeLabel">seconds</div>
                        </div>
                        <div id="minute" class="timer">
                            <div class="time"></div>
                            <div class="timeLabel">minutes</div>
                        </div>
                        <div id="hour" class="timer">
                            <div class="time"></div>
                            <div class="timeLabel">hours</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="mb-0">معلومات الشحن</h3>
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                                
                             <form action="{{ route('checkout.process', $product->id) }}" method="POST" onsubmit="return validateForm();">
                                @csrf
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">الاسم</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                                    </div>
                                </div>
                            
                                <div class="mb-3">
                                    <label for="phone" class="form-label">رقم الهاتف</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required pattern="^01[0-9]{9}$" title="يجب إدخال رقم مصري مكون من 11 رقم يبدأ بـ 01">
                                </div>
                            
                           @if ($variationType === 'colors' && !empty($colors))
    @php
        // استخراج الرقم بعد x من اسم المنتج
        preg_match('/x(\d+)/i', $product->name, $matches);
        $maxTotalQuantity = isset($matches[1]) ? (int) $matches[1] : 0;
    @endphp

    <div class="mb-3">
        <label class="form-label fw-bold">اختاري لون التنت والكمية المطلوبة:</label>
        <div class="row mt-2">
            @foreach($colors as $index => $color)
                <div class="col-md-4 col-6 mb-3">
                    <label for="color_qty_{{ $index }}" class="form-label d-block mb-1">
                        <span style="display: inline-block; width: 20px; height: 20px; background-color: {{ $color['hex'] }}; border: 1px solid #ccc; border-radius: 3px; vertical-align: middle; margin-inline-end: 5px;"></span>
                        {{ htmlspecialchars($color['name']) }}
                    </label>
                    <div class="input-group input-group-sm">
                        <input type="number"
                               class="form-control form-control-sm color-quantity"
                               id="color_qty_{{ $index }}"
                               name="variations[{{ $index }}][quantity]"
                               value="{{ old('variations.'.$index.'.quantity', 0) }}"
                               min="0"
                               max="{{ $maxTotalQuantity }}"
                               placeholder="0"
                               aria-label="Quantity for {{ htmlspecialchars($color['name']) }}" required>
                        <input type="hidden" name="variations[{{ $index }}][name]" value="{{ htmlspecialchars($color['name']) }}">
                        <input type="hidden" name="variations[{{ $index }}][type]" value="color">
                        <span class="input-group-text">عدد</span>
                    </div>
                    @error('variations.'.$index.'.quantity')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
            @endforeach
        </div>

        {{-- رسالة تحذير عند تجاوز الحد --}}
        <div class="text-danger fw-bold mt-2" id="quantity-warning" style="display: none;">
            لا يمكنك اختيار أكثر من {{ $maxTotalQuantity }} قطعة من هذا المنتج.
        </div>
    </div>

    {{-- سكربت فحص الكمية --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const maxTotal = {{ $maxTotalQuantity }};
            const inputs = document.querySelectorAll(".color-quantity");
            const warning = document.getElementById("quantity-warning");
            const submitButton = document.querySelector('button[type="submit"]');

            function updateQuantities() {
                let total = 0;

                inputs.forEach(input => {
                    const val = parseInt(input.value) || 0;
                    total += val;
                });

                if (total >= maxTotal) {
                    warning.style.display = 'block';
                    inputs.forEach(input => {
                        if ((parseInt(input.value) || 0) === 0) {
                            input.disabled = true;
                        }
                        input.classList.add('is-invalid');
                    });
                    if (submitButton) submitButton.disabled = false; // نسمحله يضيف لو الحد مساوي للعدد
                } else {
                    warning.style.display = 'none';
                    inputs.forEach(input => {
                        input.disabled = false;
                        input.classList.remove('is-invalid');
                    });
                    if (submitButton) submitButton.disabled = false;
                }
            }

            inputs.forEach(input => {
                input.addEventListener("input", updateQuantities);
            });

            updateQuantities(); // فحص أولي عند التحميل
        });
    </script>
@endif


                                 @if ($variationType === 'scents' && !empty($scents))
                                <div class="mb-3">
                                    <label class="form-label fw-bold">اختاري رائحة المعطر  والكمية المطلوبة:</label>
                                    <div class="row mt-2">
                                        @foreach($scents as $index => $scent)
                                            <div class="col-md-4 col-6 mb-3">
                                                <label for="color_qty_{{ $index }}" class="form-label d-block mb-1">
                                                    <span style="display: inline-block; width: 20px; height: 20px; background-color: {{ $color['hex'] }}; border: 1px solid #ccc; border-radius: 3px; vertical-align: middle; margin-inline-end: 5px;"></span>
                                                    {{ htmlspecialchars(scent['name']) }}
                                                </label>
                                                <div class="input-group input-group-sm">
                                                  @php
                                                    $maxQuantity = (int) filter_var($product->name, FILTER_SANITIZE_NUMBER_INT);
                                                @endphp
                                                

                                                    <input type="number"
                                                           class="form-control form-control-sm color-quantity"
                                                           id="color_qty_{{ $index }}"
                                                           name="variations[{{ $index }}][quantity]"
                                                           value="{{ old('variations.'.$index.'.quantity', 0) }}"
                                                           min="0"
                                                           max="{{ $maxQuantity }}" 
                                                           placeholder="0"
                                                           aria-label="Quantity for {{ htmlspecialchars($scent['name']) }}" required>
                                                    <input type="hidden" name="variations[{{ $index }}][name]" value="{{ htmlspecialchars($scent['name']) }}">
                                                    <input type="hidden" name="variations[{{ $index }}][type]" value="color">
                                                    <span class="input-group-text">عدد</span>
                                                </div>
                                                @error('variations.'.$index.'.quantity')
                                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label for="country" class="form-label">البلد</label>
                                    <input type="text" class="form-control" id="country" name="country" value="{{ old('country', 'مصر') }}" required>
                                </div>
                            
                                <div class="mb-3">
                                    <label for="street_address" class="form-label">العنوان</label>
                                    <input type="text" class="form-control" id="street_address" name="street_address" value="{{ old('street_address') }}" required>
                                </div>
                            
                                <div class="mb-3">
                                    <label for="apartment" class="form-label">الشقة/المبنى (اختياري)</label>
                                    <input type="text" class="form-control" id="apartment" name="apartment" value="{{ old('apartment') }}">
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="city" class="form-label">المدينة</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                                    </div>
                            
                                    <div class="col-md-4 mb-3">
                                       <label for="region" class="form-label">المنطقة/المحافظة</label>
                                        <select class="form-select" id="region" name="region" required>
                                            <option value="" selected disabled>اختر المحافظة</option>
                                            <option value="القاهرة" {{ old('region') == 'القاهرة' ? 'selected' : '' }}>القاهرة</option>
                                            <option value="الجيزة" {{ old('region') == 'الجيزة' ? 'selected' : '' }}>الجيزة</option>
                                            <option value="الإسكندرية" {{ old('region') == 'الإسكندرية' ? 'selected' : '' }}>الإسكندرية</option>
                                            <option value="الإسماعيلية" {{ old('region') == 'الإسماعيلية' ? 'selected' : '' }}>الإسماعيلية</option>
                                            <option value="أسوان" {{ old('region') == 'أسوان' ? 'selected' : '' }}>أسوان</option>
                                            <option value="أسيوط" {{ old('region') == 'أسيوط' ? 'selected' : '' }}>أسيوط</option>
                                            <option value="الأقصر" {{ old('region') == 'الأقصر' ? 'selected' : '' }}>الأقصر</option>
                                            <option value="البحر الأحمر" {{ old('region') == 'البحر الأحمر' ? 'selected' : '' }}>البحر الأحمر</option>
                                            <option value="البحيرة" {{ old('region') == 'البحيرة' ? 'selected' : '' }}>البحيرة</option>
                                            <option value="بني سويف" {{ old('region') == 'بني سويف' ? 'selected' : '' }}>بني سويف</option>
                                            <option value="بورسعيد" {{ old('region') == 'بورسعيد' ? 'selected' : '' }}>بورسعيد</option>
                                            <option value="جنوب سيناء" {{ old('region') == 'جنوب سيناء' ? 'selected' : '' }}>جنوب سيناء</option>
                                            <option value="الدقهلية" {{ old('region') == 'الدقهلية' ? 'selected' : '' }}>الدقهلية</option>
                                            <option value="دمياط" {{ old('region') == 'دمياط' ? 'selected' : '' }}>دمياط</option>
                                            <option value="سوهاج" {{ old('region') == 'سوهاج' ? 'selected' : '' }}>سوهاج</option>
                                            <option value="السويس" {{ old('region') == 'السويس' ? 'selected' : '' }}>السويس</option>
                                            <option value="الشرقية" {{ old('region') == 'الشرقية' ? 'selected' : '' }}>الشرقية</option>
                                            <option value="شمال سيناء" {{ old('region') == 'شمال سيناء' ? 'selected' : '' }}>شمال سيناء</option>
                                            <option value="الغربية" {{ old('region') == 'الغربية' ? 'selected' : '' }}>الغربية</option>
                                            <option value="الفيوم" {{ old('region') == 'الفيوم' ? 'selected' : '' }}>الفيوم</option>
                                            <option value="القليوبية" {{ old('region') == 'القليوبية' ? 'selected' : '' }}>القليوبية</option>
                                            <option value="قنا" {{ old('region') == 'قنا' ? 'selected' : '' }}>قنا</option>
                                            <option value="كفر الشيخ" {{ old('region') == 'كفر الشيخ' ? 'selected' : '' }}>كفر الشيخ</option>
                                            <option value="مطروح" {{ old('region') == 'مطروح' ? 'selected' : '' }}>مطروح</option>
                                            <option value="المنوفية" {{ old('region') == 'المنوفية' ? 'selected' : '' }}>المنوفية</option>
                                            <option value="المنيا" {{ old('region') == 'المنيا' ? 'selected' : '' }}>المنيا</option>
                                            <option value="الوادي الجديد" {{ old('region') == 'الوادي الجديد' ? 'selected' : '' }}>الوادي الجديد</option>
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="mb-3">
                                    <label for="notes" class="form-label">ملاحظات (اختياري)</label>
                                    <textarea class="form-control" id="notes" name="notes" rows="3">{{ old('notes') }}</textarea>
                                </div>
                                        
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="terms" required>
                                    <label class="form-check-label" for="terms">
                                        أوافق على مصاريف الشحن
                                    </label>
                                </div>
                            
                                <div class="d-grid gap-2">
                                      <input type="hidden" name="quantity" id="quantityInput" value="1">
                                     
                                      <input type="hidden" name="selected_colors_count" id="selected_colors_count" value="0">
                                    <button type="submit" class="btn btn-primary btn-lg">إتمام الطلب</button>
                                </div>
                            </form>
                            
                            <script>
                                function validateForm() {
                                    const phone = document.getElementById('phone').value.trim();
                                    const phoneRegex = /^01[0-9]{9}$/;
                            
                                    if (!phoneRegex.test(phone)) {
                                        alert("من فضلك أدخل رقم هاتف مصري صحيح مكون من 11 رقم يبدأ بـ 01");
                                        return false;
                                    }
                            
                                    // التحقق من الحقول المطلوبة
                                    const requiredFields = document.querySelectorAll('input[required], select[required], textarea[required]');
                                    for (const field of requiredFields) {
                                        if (!field.value.trim()) {
                                            alert("يرجى ملء جميع الحقول المطلوبة");
                                            field.focus();
                                            return false;
                                        }
                                    }
                            
                                    return true;
                                }
                            </script>

                        </div>
                    </div>
                </div>
                
               <div class="col-md-6 order-md-1">
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0">ملخص الطلب</h3>
    </div>
    <div class="card-body">
        <div class="d-flex align-items-center gap-3 mb-4">
            @if($product->hasMedia('product_images'))
                <img src="{{ asset('storage/' . $product->getFirstMedia('product_images')->id . '/' . $product->getFirstMedia('product_images')->file_name) }}" 
                     alt="{{ $product->name }}" 
                     class="img-fluid me-3" 
                     style="max-width: 100px;">
            @else
                <img src="{{ asset('assets/images/911111.webp') }}" 
                     alt="{{ $product->name }}" 
                     class="img-fluid me-3" 
                     style="max-width: 100px;">
            @endif
            
            <div>
                <h4>{{ $product->name }}</h4>
                <h5 class="text-primary">{{ $product->price }} ج.م</h5>
            </div>
        </div>
        
        <div class="mb-3">
            <p>{!! nl2br(e($product->description)) !!}</p>
        </div>

        <!-- Form submission -->
        <form id="checkoutForm" action="{{ route('checkout.process', $product->id) }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            
            <!-- Quantity controls inside the form -->
            <div class="mb-3">
                <p>الكمية:</p>
                <div class="d-flex align-items-center gap-3">
                    <button type="button" class="decrease" 
                        style="background: #E74C3C; color: white; border: none; font-size: 20px; padding: 5px 10px; cursor: pointer; border-radius: 5px;">
                        -
                    </button>
                    <span class="quantity" style="font-size: 18px; font-weight: bold; width: 30px; text-align: center;">1</span>
                    <button type="button" class="increase" 
                        style="background: #27AE60; color: white; border: none; font-size: 20px; padding: 5px 10px; cursor: pointer; border-radius: 5px;">
                        +
                    </button>
                </div>
            </div>
            
            <!-- Quantity input - must be inside the form -->
            <input type="hidden" name="quantity" id="quantityInput" value="1">

            <div class="mb-4">
                <div class="d-flex justify-content-between">
                    <strong>السعر قبل مصاريف الشحن:</strong>
                    <strong id="totalPrice">{{ $product->price }} ج.م</strong>
                </div>
            </div>

            <!-- Your original form fields continue here -->
            
            <button type="submit" class="btn btn-primary">إتمام الطلب</button>
        </form>
    </div>
</div>



{{-- JavaScript to Handle Quantity Update --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Pass the productId from Laravel to JavaScript
    const productId = @json($product->id);
    const productPrice = @json($product->price);
    
    // Get elements
    const form = document.getElementById('checkoutForm');
    const quantitySpan = document.querySelector('.quantity');
    const quantityInput = document.getElementById('quantityInput');
    const decreaseBtn = document.querySelector('.decrease');
    const increaseBtn = document.querySelector('.increase');
    const totalPrice = document.getElementById('totalPrice');
    
    // Function to update total price
    function updateTotalPrice(quantity) {
        const total = productPrice * quantity;
        totalPrice.innerText = total + ' ج.م';
    }
    
    // Function to load quantity from localStorage
    function loadQuantity() {
        const savedQty = localStorage.getItem(`product_qty_${productId}`);
        const quantityValue = savedQty ? parseInt(savedQty) : 1;
        
        // Update both display and form input
        quantitySpan.innerText = quantityValue;
        quantityInput.value = quantityValue;
        
        // Update price display
        updateTotalPrice(quantityValue);
        
        console.log("Loaded quantity:", quantityValue);
    }
    
    // Increase quantity
    increaseBtn.addEventListener('click', function() {
        let currentValue = parseInt(quantitySpan.innerText);
        let newValue = currentValue + 1;
        
        // Update UI
        quantitySpan.innerText = newValue;
        
        // Update form input value - CRITICAL
        quantityInput.value = newValue;
        
        // Save to localStorage
        localStorage.setItem(`product_qty_${productId}`, newValue);
        
        // Update price
        updateTotalPrice(newValue);
        
        console.log("Increased quantity to:", newValue);
    });
    
    // Decrease quantity
    decreaseBtn.addEventListener('click', function() {
        let currentValue = parseInt(quantitySpan.innerText);
        if (currentValue > 1) {
            let newValue = currentValue - 1;
            
            // Update UI
            quantitySpan.innerText = newValue;
            
            // Update form input value - CRITICAL
            quantityInput.value = newValue;
            
            // Save to localStorage
            localStorage.setItem(`product_qty_${productId}`, newValue);
            
            // Update price
            updateTotalPrice(newValue);
            
            console.log("Decreased quantity to:", newValue);
        }
    });
    
    // Form submit event - ensure quantity is set correctly before submission
    form.addEventListener('submit', function(event) {
        // Get current displayed quantity
        const displayedQuantity = parseInt(quantitySpan.innerText);
        
        // Set the hidden input value to match
        quantityInput.value = displayedQuantity;
        
        console.log("Form submitted with quantity:", quantityInput.value);
    });
    
    // Load saved quantity when the page is loaded
    loadQuantity();
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const inputs = document.querySelectorAll('.color-quantity');

    function updateQuantities() {
        let total = 0;

        // اجمع الإجمالي
        inputs.forEach(input => {
            const val = parseInt(input.value) || 0;
            total += val;
        });

        // التحكم في الإدخالات
        if (total >= maxTotal) {
            inputs.forEach(input => {
                const val = parseInt(input.value) || 0;
                if (val === 0) {
                    input.disabled = true;
                } else {
                    input.disabled = false;
                    input.max = val;
                }
            });
        } else {
            inputs.forEach(input => {
                input.disabled = false;
                const val = parseInt(input.value) || 0;
                const remaining = maxTotal - (total - val);
                input.max = val + remaining;
            });
        }
    }

    // حدث عند كل تغيير
    inputs.forEach(input => {
        input.addEventListener('input', updateQuantities);
    });

    updateQuantities();
});
</script>




<script>
    document.addEventListener('DOMContentLoaded', function() {
    const colorInputs = document.querySelectorAll('.color-quantity');
    const scentInputs = document.querySelectorAll('.scent-quantity');

    function updateTotalQuantity() {
        let totalQuantity = 0;

        // Calculate total for color variations
        colorInputs.forEach(input => {
            totalQuantity += parseInt(input.value) || 0;
        });

        // Calculate total for scent variations
        scentInputs.forEach(input => {
            totalQuantity += parseInt(input.value) || 0;
        });

        // Check if the total exceeds the maximum allowed quantity
        if (totalQuantity > maxQuantity) {
            alert(`يمكنك اختيار إجمالي كميات لا يتجاوز ${maxQuantity} فقط.`);
            
            // Disable further input if limit is exceeded
            colorInputs.forEach(input => {
                if (parseInt(input.value) > 0) {
                    input.setAttribute('disabled', 'true');
                }
            });

            scentInputs.forEach(input => {
                if (parseInt(input.value) > 0) {
                    input.setAttribute('disabled', 'true');
                }
            });
        } else {
            // Enable inputs if total is within the limit
            colorInputs.forEach(input => {
                input.removeAttribute('disabled');
            });

            scentInputs.forEach(input => {
                input.removeAttribute('disabled');
            });
        }
    }

    // Add event listeners to input fields
    colorInputs.forEach(input => {
        input.addEventListener('input', updateTotalQuantity);
    });

    scentInputs.forEach(input => {
        input.addEventListener('input', updateTotalQuantity);
    });
});

</script>


            </div>

            </div>
        </div>
    </section>

   <footer>
    <div class="container">
        <div class="copyright text-start py-3">
            All Right reserved by 
            <a href="https://creatious.online/" target="_blank" rel="noopener noreferrer">
                Creatious Marketing Agency
            </a>
        </div>
    </div>
</footer>


    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
