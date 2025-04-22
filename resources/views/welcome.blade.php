<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    
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
    
    
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <title>Rosmary Organic</title>
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
                <div class="headerBtn">
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
                    <a href="#">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-comment-dots" viewBox="0 0 512 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M256 32C114.6 32 0 125.1 0 240c0 49.6 21.4 95 57 130.7C44.5 421.1 2.7 466 2.2 466.5c-2.2 2.3-2.8 5.7-1.5 8.7S4.8 480 8 480c66.3 0 116-31.8 140.6-51.4 32.7 12.3 69 19.4 107.4 19.4 141.4 0 256-93.1 256-208S397.4 32 256 32zM128 272c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128 0c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128 0c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z">
                            </path>
                        </svg>
                        <span>
                            تواصل معنا
                        </span>
                    </a>
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
    <section class="hero">
    </section>
    <div class="bg-red">
        <section class="overflow">
            <div class="tent">
                <div class="container">
                    <h3 class="title">
                        تنـت روزمارى
                    </h3>
                    <p class="headDesc">
                        مناسب لجميع انواع البشره
                    </p>
                    <img src="{{ asset('assets/images/tint1.webp') }}" alt="تنت روزمارى">
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="pb-4">
                    <div class="mb-4">
                        <h3 class="title black">
                            تنـت روزمارى
                        </h3>
                        <p class="headDesc" style="color: white;">
                            بمكونات طبيعية تماما وسعر تحفة
                        </p>

                    </div>
                    <!-- Slider main container -->
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <img src="{{ asset('assets/images/trg.webp') }}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('assets/images/tint1-1.webp') }}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('assets/images/tinit1c.webp') }}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('assets/images/trg.webp') }}" alt="">
                            </div>
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section>
        <div class="container">
            <div class="bluch-container">
                <div class="d-flex bluch gap-2 align-items-center">
                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-check-circle" viewBox="0 0 512 512"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                        </path>
                    </svg>
                    <div>
                        لا يسبب بقع اطلاقا
                    </div>
                </div>
                <div class="d-flex bluch gap-2 align-items-center">
                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-check-circle" viewBox="0 0 512 512"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                        </path>
                    </svg>
                    <div>
                        اقـــوى ثبات
                    </div>
                </div>
                <div class="d-flex bluch gap-2 align-items-center">
                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-check-circle" viewBox="0 0 512 512"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                        </path>
                    </svg>
                    <div>
                        توزيع مثالي
                    </div>
                </div>
                <div class="d-flex bluch gap-2 align-items-center">
                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-check-circle" viewBox="0 0 512 512"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                        </path>
                    </svg>
                    <div>
                        للخدود والشفايف
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-4">
        <div class="container">
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/images/photor.webp') }}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/images/photor.webp') }}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/images/photor.webp') }}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/images/photor.webp') }}" alt="">
                    </div>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <section class="mt-4">
        <div class="container">
            <h3 class="text-center">
                متوفر بـ 3 درجات :
            </h3>
            <div class="fruits">
                <p>
                    خوخــــــــــــــــــى 🍑
                </p>
                <p>
                    أحمـــــــــــــــــــــر 🍓
                </p>
                <p>
                    بينـــــــــــــــــــــك🍉
                </p>
            </div>
            <h3 class="text-center mb-4">
                الحجم: 20 جرام
            </h3>
        </div>
    </section>
    <section class="red pt-5">
        <div class="container">
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/images/of.webp') }}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/images/454.webp') }}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/images/of.webp') }}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/images/of.webp') }}" alt="">
                    </div>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>
            <h3 class="sub-title black text-md-end text-center">
                آراء وتعليقات
            </h3>
            <p class="headDesc text-md-end text-center" style="color: white;">
                عميلاتنــا السابقات
            </p>
            <div class="swiper arrows">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($testimonials as $testimonial)
                        @if($testimonial->hasMedia('testimonial_images'))
                            @foreach($testimonial->getMedia('testimonial_images') as $media)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/' . $media->id . '/' . $media->file_name) }}" alt="{{ $testimonial->title }}">

                                </div>
                            @endforeach
                        @else
                            <div class="swiper-slide">
                                <img src="{{ asset('assets/images/r10.webp') }}" alt="{{ $testimonial->title }}">
                            </div>
                        @endif
                    @endforeach
                </div>
                <!-- If we need pagination -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <!--<div class="d-flex flex-wrap justify-content-between">-->
            <!--    {{-- عرض الصور --}}-->
            <!--    @foreach ($testimonials->where('type', 'image')->take(4) as $imageTestimonial)-->
            <!--        @if($imageTestimonial->hasMedia('testimonial_images'))-->
            <!--            <div class="p-2">-->
            <!--                <img src="{{ asset('storage/' . $imageTestimonial->getFirstMedia('testimonial_images')->id . '/' . $imageTestimonial->getFirstMedia('testimonial_images')->file_name) }}" -->
            <!--                    width="320" style="border-radius:20px;overflow:hidden">-->
            <!--            </div>-->
            <!--        @endif-->
            <!--    @endforeach-->
            <!--</div>-->

            {{-- عرض الفيديوهات (محلية) --}}
            <div class="d-flex flex-wrap justify-content-between mt-3">
                @foreach ($testimonials->where('type', 'video')->take(4) as $videoTestimonial)
                    @if($videoTestimonial->hasMedia('testimonial_videos'))
                        <div class="p-2">
                            <video width="320" controls style="border-radius:20px;overflow:hidden">
                                <source src="{{ asset('storage/' . $videoTestimonial->getFirstMedia('testimonial_videos')->id . '/' . $videoTestimonial->getFirstMedia('testimonial_videos')->file_name) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @endif
                @endforeach
            </div>

            {{-- فيديو الإطار المضمّن (Facebook) يبقى دائمًا تحت الصور --}}
            <div class="d-flex flex-wrap justify-content-between mt-3">
                <iframe src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2F100080598241321%2Fvideos%2F6967807423346867%2F&show_text=false&width=279&t=0"
                        width="320" style="border-radius:20px;overflow:hidden" scrolling="no" frameborder="0"
                        allowfullscreen="true" class="p-2"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                </iframe>
            </div>
            
            

        </div>
    </section>
    <section class="mt-5">
        <div class="container">
            <h3 class="text-center mb-2">
                أختاري من عروض
            </h3>
            <h3 class="title pt-0">
                تنـت روزمارى
            </h3>
            <p class="headDesc">
                مناسب لجميع انواع البشره
            </p>
           <style>
    /* تأثير الاهتزاز */
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        50% { transform: translateX(5px); }
        75% { transform: translateX(-5px); }
    }

    /* تأثير النبض عند التمرير */
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }

    /* تنسيق الزر */
    .buy-btn {
        display: inline-block;
        background: #ff4500;
        color: white;
        padding: 12px 20px;
        border-radius: 8px;
        font-size: 20px;
        font-weight: bold;
        text-decoration: none;
        text-align: center;
        transition: all 0.3s ease-in-out;
        animation: shake 0.6s ease-in-out infinite alternate;
        animation-delay: 3s; /* يبدأ الاهتزاز بعد 3 ثوانٍ */
    }

    /* تأثير النبض عند تمرير الماوس */
    .buy-btn:hover {
        animation: pulse 0.5s ease-in-out;
        background: #ff5722;
    }
</style>

    <div class="products">
        @foreach ($products->where('category_id', null) as $product)
            <div class="product" style="border: 1px solid #ddd; padding: 15px; border-radius: 10px; text-align: center; position: relative;">
                @if($product->hasMedia('product_images'))
                    <img src="{{ asset('storage/' . $product->getFirstMedia('product_images')->id . '/' . $product->getFirstMedia('product_images')->file_name) }}" 
                         alt="{{ $product->name }}" 
                         style="width: 100%; border-radius: 10px;">
                @else
                    <img src="{{ asset('assets/images/911111.webp') }}" 
                         alt="{{ $product->name }}" 
                         style="width: 100%; border-radius: 10px;">
                @endif
    
                <h2 class="name" style="margin-top: 10px; font-size: 22px; font-weight: bold;">
                    {{ $product->name }}
                </h2>
    
                @php
                    if ($product->price <= 65) {
                        $oldPrice = 80;
                    } elseif ($product->price <= 125) {
                        $oldPrice = 160;
                    } else {
                        $oldPrice = round($product->price * 1.3);
                    }
                    $discountPercentage = round((($oldPrice - $product->price) / $oldPrice) * 100);
                @endphp
    
                <div style="position: absolute; top: 10px; left: 10px; background: green; color: white; padding: 5px 10px; border-radius: 5px; font-size: 14px;">
                    خصم {{ $discountPercentage }}% 🔥
                </div>
    
                <h2 class="price" style="color: red; font-size: 28px; font-weight: bold; margin: 10px 0;">
                    {{ $product->price }} ج.م
                </h2>
                <h3 class="old-price" style="text-decoration: line-through; color: gray; font-size: 18px; margin-bottom: 10px;">
                    {{ $oldPrice }} ج.م
                </h3>
    
                <p style="color: #555;">{!! nl2br(e($product->description)) !!}</p>
    
                <a href="javascript:void(0);" 
                   onclick="buyNow({{ $product->id }}, '{{ $product->name }}', {{ $product->price }}, '{{ $product->image_url }}')" 
                   class="buy-btn">
                    🛒 أشتري الآن
                </a>

            </div>
        @endforeach
    </div>

        </div>
    </section>
    <br><br>
    <!--<section class="mt-5">-->
    <!--    <div class="container">-->
    <!--        <h5 class="sub-title text-center black mb-4">-->
    <!--            المزيد من عروض روزماري-->
    <!--        </h5>-->
    <!--        <div class="swiper offers">-->
                <!-- Additional required wrapper -->
    <!--            <div class="swiper-wrapper">-->
                    <!-- Slides -->
    <!--                @foreach ($products as $product)-->
    <!--                    <div class="swiper-slide">-->
    <!--                        @if($product->hasMedia('product_images'))-->
    <!--                            <img src="{{ asset('storage/' . $product->getFirstMedia('product_images')->id . '/' . $product->getFirstMedia('product_images')->file_name) }}" alt="{{ $product->name }}">-->
    <!--                        @else-->
    <!--                            <img src="{{ asset('assets/images/4.webp') }}" alt="{{ $product->name }}">-->
    <!--                        @endif-->
    <!--                        <h3>-->
    <!--                            <a class="text-center">{{ $product->name }}</a>-->
    <!--                        </h3>-->
    <!--                        <p class="text-center">-->
    <!--                            <a href="{{ route('checkout.show', $product->id) }}">تعرفي على العرض</a>-->
    <!--                        </p>-->
    <!--                    </div>-->
    <!--                @endforeach-->
    <!--            </div>-->
                <!-- If we need pagination -->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <footer>-->
    <!--        <div class="container">-->
    <!--            <div class="copyright text-start py-3">-->
    <!--                All rights reserved-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </footer>-->
    <!--</section>-->
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const swiper = new Swiper('.swiper', {
                slidesPerView: 1,
                spaceBetween: 10,
                speed: 400,
                loop: true,
                pagination: {
                    el: ".swiper-pagination", // Target pagination container
                    clickable: true, // Allow clicking on bullets
                },
                autoplay: { delay: 4000 },
                breakpoints: {
                    480: { slidesPerView: 2, spaceBetween: 20 },
                    640: { slidesPerView: 2, spaceBetween: 20 },
                    768: { slidesPerView: 3, spaceBetween: 20 }
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
            const swiper = new Swiper('.swiper.arrows', {
                slidesPerView: 1,
                spaceBetween: 10,
                speed: 400,
                loop: true,
                pagination: {
                    el: ".swiper-pagination", // Target pagination container
                    clickable: true, // Allow clicking on bullets
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: { delay: 4000 },
                breakpoints: {
                    480: { slidesPerView: 2, spaceBetween: 20 },
                    640: { slidesPerView: 2, spaceBetween: 20 },
                    768: { slidesPerView: 3, spaceBetween: 20 }
                }
            });
        });
    </script>
</body>

</html>