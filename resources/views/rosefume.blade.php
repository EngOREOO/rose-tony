<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Noto+Sans+Arabic:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Baloo+Bhaijaan+2:wght@400..800&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Noto+Sans+Arabic:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Baloo+Bhaijaan+2:wght@400..800&family=Fustat:wght@200..800&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Noto+Sans+Arabic:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
        
        
     
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
    <link rel="stylesheet" href="./assets2/css/main.css">
    <style>
/* Hero Section Styling */

.hero {
    padding: 60px 0;
    overflow: hidden;
}

.heroContent {
    direction: rtl;
    padding: 0 15px;
}

.heroContent h1 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 15px;
    line-height: 1.3;
}

.heroContent h2 {
    font-size: 1.5rem;
    margin-bottom: 15px;
    line-height: 1.3;
}

.heroContent p {
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: 20px;
}

/* Swiper Container Styling */
.swiper-container {
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
}

.swiper.main {
    width: 100%;
    border-radius: 12px;
    overflow: hidden;
    margin-bottom: 10px;
}

.swiper.thumbs {
    width: 100%;
}

.swiper.thumbs .swiper-slide {
    opacity: 0.6;
    cursor: pointer;
    border-radius: 8px;
    overflow: hidden;
    transition: opacity 0.3s;
}

.swiper.thumbs .swiper-slide-thumb-active {
    opacity: 1;
}

.swiper-slide img {
    width: 100%;
    height: auto;
    display: block;
}

/* Button Styling */
.button {
    display: inline-block;
    padding: 12px 30px;
    background-color: #FFF9EA00;
    color: #000000;
    text-decoration: none;
    border-radius: 30px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-align: center;
}

.button:hover {
    background-color: #ff5252;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
}

/* Responsive Adjustments */
@media (max-width: 991px) {
    .hero {
        padding: 40px 0;
    }
    
    .heroContent {
        text-align: center;
    }
    
    .heroContent h1 {
        font-size: 1.8rem;
    }
    
    .heroContent h2 {
        font-size: 1.3rem;
    }
    
    .swiper-container {
        margin-bottom: 20px;
    }
}

@media (max-width: 767px) {
    .heroContent h1 {
        font-size: 1.5rem;
    }
    
    .heroContent h2 {
        font-size: 1.2rem;
    }
    
    .heroContent p {
        font-size: 0.9rem;
    }
    
    .swiper.thumbs {
        max-width: 90%;
        margin: 0 auto;
    }
    
    .swiper.thumbs .swiper-slide {
        width: 20%;
    }
}

@media (min-width: 992px) {
    .heroContent {
        padding-right: 30px;
    }
}
    </style>
    <title>Rosmary Organic</title>
</head>

<body>
    <div class="larg-container">
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
                        <img src="./assets2/images/logo.webp" alt="">
                    </div>
                    <div class="d-flex" id="timer">
                        <div class="timerTitle">
                            ينتهي العرض بعد
                        </div>
                        <div class="d-flex gap-2 flex-grow-1">
                            <div id="second" class="timer">
                                <div class="time fatFace"></div>
                                <div class="timeLabel baloo">seconds</div>
                            </div>
                            <div id="minute" class="timer">
                                <div class="time fatFace"></div>
                                <div class="timeLabel baloo">minutes</div>
                            </div>
                            <div id="hour" class="timer">
                                <div class="time fatFace"></div>
                                <div class="timeLabel baloo">hours</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
<section class="hero">
            <div class="container">
                <div class="d-flex justify-content-center align-items-center flex-lg-row flex-column">
                    <div class="heroContent">
                        <h1>
                            روزفيــــــــــــــــــوم
                            <br>
                            برفيوم الشعر الطبيعي
                            <br>
                            الأول في مصر
                        </h1>
                        <h2>
                            برفيوم طبيعى آمن للشعر
                            <br>
                            مناسب لجميع انواع الشعر
                        </h2>
                        <p>
                            <strong class="baloo">
                                معطر الشعر الطبيعي الآمن هو المنتج الذي تنتظره لتعزيز جمال ورفاهية شعرك بأمان تام. نقدم
                                لك مجموعة من الروائح الرائعة والفريدة التي تناسب جميع الأذواق، ستحول تجربة استخدامك
                                لمعطر الشعر إلى لحظة سحرية تستمر طوال اليوم
                            </strong>
                        </p>
                    </div>
                    <div class="swiper-container">
                        <div class="swiper main" id="main">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <div class="swiper-slide">
                                    <img src="/assets2/images/DSCF3381-copy.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/DSCF3663-copy.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/IMG_0754.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/IMG_0761.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/DSCF3381-copy.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/DSCF3663-copy.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/IMG_0754.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/IMG_0761.webp" alt="">
                                </div>
                            </div>
                            <!-- If we need pagination -->
                        </div>
                        <div class="swiper thumbs" id="thumbs">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <div class="swiper-slide">
                                    <img src="/assets2/images/DSCF3381-copy.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/DSCF3663-copy.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/IMG_0754.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/IMG_0761.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/DSCF3381-copy.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/DSCF3663-copy.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/IMG_0754.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/IMG_0761.webp" alt="">
                                </div>
                            </div>
                            <!-- If we need pagination -->
                        </div>
                        <div class="mt-4 d-flex justify-content-center">
                            <a href="/" class="button">
                                أشتري الآن
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>    </div>
  <section class="mt-4">
    <div class="px-2">
        <h2 class="title">
            ليه تختاري بيرفيوم الشعر؟  
            <br>
            روزفيــــــــــــــــــــــــــوم
        </h2>
        <div class="swiper arrows single">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide baloo" style="background-image: url('./assets2/images/bardya1.webp');">
                    البرفيوم طبيعى تماما وامن، حتى المادة الحافظة والألوان هي خامات غذائية تماما  
                    <br>---------------------------
                    <br>مناسب لجميع انواع الشعر
                    <br>---------------------------
                    <br>خالى تماما من الكحول
                    <br>---------------------------
                    <br>امن للشعر المعمول بروتين أو الفيلر أو المصبوغ
                    <br>---------------------------
                    <br>لا يسبب اى ملمس زيتى غير مرغوب للشعر عشان كدا هو مثالى للشعر الدهنى
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide baloo" style="background-image: url('./assets2/images/bardya2-e1698418132721-240x300.webp');">
                    يمكن إستخدامه مع السيشوار والبيبى-ليس
                    <br>---------------------------
                    <br>بيغذى الشعر لاحتوائه على فيتامين E
                    <br>---------------------------
                    <br>بيرطب الشعر لانه يحتوى على الجلسرين الطبى
                    <br>---------------------------
                    <br>امن تماما لمرضى حساسية جيوب الأنفية والصدر.
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide baloo" style="background-image: url('./assets2/images/bardya3-e1698418286657-239x300.webp');">
                    نقدر نستخدمه كـ بادى اسبلاش للجسم
                    <br>---------------------------
                    <br>نقدر نستخدمه على الملابس والطرح لانه مش بيسيب اى بقع نهائى
                    <br>---------------------------
                    <br>ثبات قوى جدا يدوم معاكى طويلا
                    <br>---------------------------
                    <br>نقدر نستخدمه على الشعر وهو مبلول أو ناشف
                </div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <div class="mt-3 d-flex justify-content-center align-items-center">
            <img style="max-width: 100%;" src="./assets2/images/bird.webp" alt="">
        </div>
        <div class="mt-4 d-flex justify-content-center">
            <a href="#offers-section" class="button">
                أشتري الآن
            </a>
        </div>
    </div>
</section>

<section class="mt-4">
    <div class="px-2">
        <h2 class="title text-center mb-4">
            فيديو عن روزفيــوم
        </h2>

        <div style="display: flex; justify-content: center;">
            <div style="width: 100%; max-width: 360px; aspect-ratio: 9 / 16; overflow: hidden; border-radius: 12px;">
                <video controls autoplay muted playsinline style="width: 100%; height: 100%; object-fit: cover;">
                    <source src="./assets2/images/AQPVCrxjAN7Wk3C1VXqJuxhDvl8yrXDNDNnTVWOLie7duqG1NbXswiR3wzLqEl5rWOiccTvjU3YxHhEtnKOjowQQ.mp4" type="video/mp4">
                    متصفحك لا يدعم عرض الفيديو.
                </video>
            </div>
        </div>
    </div>
</section>

<div class="my-4 d-flex justify-content-center align-items-center">
    <img style="max-width: 100%;" src="./assets2/images/line.webp" alt="">
</div>

<section class="mt-4">
    <div class="px-2">
        <h2 class="title text-center">
            6 روايح<br>لـ روزفيــــــــــــــــــوم<br>بيرفيوم الشعر
        </h2>
    </div>
</section>



<style>
.video-container {
    position: relative;
    padding-bottom: 56.25%; /* نسبة أبعاد الفيديو 16:9 */
    height: 0;
    overflow: hidden;
    max-width: 100%;
    background: #000;
    border-radius: 10px; /* زوايا مستديرة لجعل المظهر أنيق */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
}

.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>


    <!-- <div class="bg-red">
        <section class="overflow">
            <div class="tent">
                <div class="container">
                    <h3 class="title">
                        تنـت روزمارى
                    </h3>
                    <p class="headDesc">
                        مناسب لجميع انواع البشره
                    </p>
                    <img src="./assets2/images/tint1.webp" alt="">
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
                        <p class="headDesc">
                            بمكونات طبيعية تماما وسعر تحفة
                        </p>
                    </div>
                    <div class="normalSwiper swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="./assets2/images/trg.webp" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets2/images/of.webp" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets2/images/of.webp" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets2/images/trg.webp" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets2/images/of.webp" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets2/images/trg.webp" alt="">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
    </div> -->
   <section class="mt-4">
    <div class="container position-relative">
        <div class="four swiper arrows">
            <div class="swiper-wrapper">
                @php
                $products = \App\Models\Product::where('category_id', 1)->get();
                @endphp
               @foreach($products as $product)
                <div class="swiper-slide">
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
            
                        <h2 class="name">{{ $product->name }}</h2>
            
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
            
                        <h2 class="price">{{ $product->price }} <span>ج.م</span></h2>
                        <h3 class="old-price" style="text-decoration: line-through; color: gray; font-size: 18px; margin-bottom: 10px;">
                            {{ $oldPrice }} ج.م
                        </h3>
            
                        <p class="baloo">{!! nl2br(e($product->description)) !!}</p>
            
                        
                    </div>
                </div>
            @endforeach

            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="swiper-button-prev nd"></div>
        <div class="swiper-button-next nd"></div>
    </div>

    <div class="mt-4 d-flex justify-content-center">
    <a href="#offers-section" class="button solid buy-btn">أشتري الآن</a>
</div>


</section>
    <section>
        <div class="mt-3 d-flex justify-content-center align-items-center">
            <img style="max-width: 100%;" src="./assets2/images/ele.webp" alt="">
        </div>
       <div class="normalSwiper swiper arrows">

        <div class="swiper-wrapper">
        @php
        $testimonials = \App\Models\Testimonial::with(['media' => function ($query) {
            $query->where('collection_name', 'testimonial_images')->orderBy('id', 'DESC');
        }])->where('category_id', 1)->get(); // تصفية التوصيات التي لها category_id = 1
        @endphp
        
        @foreach ($testimonials as $testimonial)
            @foreach ($testimonial->getMedia('testimonial_images') as $image) 
                <div class="swiper-slide">
                    <img src="{{ asset('storage/' . $image->id . '/' . $image->file_name) }}" alt="Testimonial Image">
                </div>
            @endforeach
        @endforeach
    </div>
        <div class="swiper-button-prev thrd"></div>
        <div class="swiper-button-next thrd"></div>
    </div>

        <div>
            <h2 class="sub-title text-center">
                حجم وتركيز المنتج
            </h2>
        </div>
        <div class="bluch-container">
            <div class="d-flex bluch gap-2 align-items-center">
                <svg aria-hidden="true" class="e-font-icon-svg e-fas-check-circle" viewBox="0 0 512 512"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                    </path>
                </svg>
                <div>
                    حجم العبوة الواحدة : 120 مللي.
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
                    وزن العبوة الواحدة : 130 جرام.
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
                    تركيز العطر فى العبوة : 13 جرام لكل 100 جرام.
                </div>
            </div>
        </div>
        <div class="offerdesc my-4">
            وده يعتبر أعلى تركيز فى السوق ويوازى 3 أضعاف على الاقل من أى معطر شعر أو بودى سبلاش موجود
        </div>
    </section>
    <div class="my-4 d-flex justify-content-center align-items-center">
        <img style="max-width: 100%;" src="./assets2/images/line.webp" alt="">
    </div>
    
    <section id="offers-section">
        <div class="container">
            <h2 class="title">
                عروض روزفيوم<br>أشتري بيرفيوم الشعر
            </h2>
            <h3 class="small-title">
                أختاري روائح / مود العطر اللي نفسك فيها داخل المجموعة
            </h3>
            <div class="products">
            @php
                $products = \App\Models\Product::where('category_id', 3)->get();
            @endphp
            @foreach ($products as $product)
                <div class="product" style="border: 1px solid #ddd; padding: 15px; border-radius: 10px; text-align: center; position: relative; background: #F9F9F9; margin-bottom: 20px;">
                    
                    {{-- Product Image --}}
                    <img src="{{ asset('storage/' . $product->getFirstMedia('product_images')->id . '/' . $product->getFirstMedia('product_images')->file_name) }}" 
                         alt="{{ $product->name }}" 
                         style="width: 150px; height: auto; border-radius: 10px; margin-bottom: 10px;">
        
                    {{-- Product Name --}}
                    <h2 class="name" style="margin-top: 10px; font-size: 22px; font-weight: bold;">
                        {{ $product->name }}
                    </h2>
        
                    {{-- Product Description --}}
                    
                    <p class="baloo" style="color: #FF6600; font-weight: bold;">
                        {!! nl2br(e($product->slug)) !!}
                    </p>
        
                    {{-- Shipping Info --}}
                    <p class="shipping" style="color: #666; font-size: 14px; margin-top: 5px;">
                        الشحن رمزي 16  L.E لكل المحافظات ما عدا <br>
                        محافظات الصعيد والبحر الأحمر 26ج <br>
                        وشرم الشيخ والوادي الجديد 57ج
                    </p>
        
                    {{-- Product Price --}}
                    <h2 class="price baloo" style="color: #555; font-size: 24px; font-weight: bold; margin: 10px 0;">
                        @if(isset($product->old_price))
                            <span style="text-decoration: line-through; color: #999; font-size: 18px;">{{ $product->old_price }} ج.م</span> 
                            <br>
                        @endif
                        <span style="color: #E74C3C;">{{ $product->price }} ج.م</span>
                    </h2>
                    <h2 class="old-price" style="text-decoration: line-through; color: gray; font-size: 18px; margin-bottom: 10px;">
                    {{ $product->discounted_price }} ج.م
                    </h2>
        
                    {{-- Buy Button & Quantity Counter --}}
                    <!-- زر "اشتري الآن" -->
                  <div class="d-flex" style="display: flex; flex-direction: column; gap: 10px; margin-top: 10px;">
                    <a href="javascript:void(0);" class="btn buy-btn" 
                       style="background: #4F6B4F; color: white; padding: 10px 0; border-radius: 5px; font-size: 18px; font-weight: bold; cursor: pointer; width: 100%;" 
                       onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }}, '{{ $product->image_url }}')">
                        اشتري الآن
                    </a>
                    <!-- داخل صفحة المنتج -->

        
                        {{-- Quantity Counter --}}
                        <div class="counter" style="display: flex; align-items: center; justify-content: center; border: 1px solid #ddd; border-radius: 5px; padding: 5px; background: white; margin-top: 10px;">
                            <button class="decrease" onclick="decreaseQuantity(this)" 
                                style="background: #E74C3C; color: white; border: none; font-size: 20px; padding: 5px 10px; cursor: pointer; border-radius: 5px;">
                                -
                            </button>
                            <span class="quantity" style="font-size: 18px; font-weight: bold; width: 30px; text-align: center;">1</span>
                            <button class="increase" onclick="increaseQuantity(this)" 
                                style="background: #27AE60; color: white; border: none; font-size: 20px; padding: 5px 10px; cursor: pointer; border-radius: 5px;">
                                +
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <script>
function buyNow(productId, productName, productPrice, productImage, source = 'rosefum') {
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

    // Redirect to checkout page with source parameter
    window.location.href = `/checkout/${productId}?source=${source}`;
}
</script>


        {{-- JavaScript to Handle Quantity Update --}}
        <script>
            function increaseQuantity(button) {
                let quantityElement = button.parentElement.querySelector('.quantity');
                let currentValue = parseInt(quantityElement.innerText);
                quantityElement.innerText = currentValue + 1;
            }
        
            function decreaseQuantity(button) {
                let quantityElement = button.parentElement.querySelector('.quantity');
                let currentValue = parseInt(quantityElement.innerText);
                if (currentValue > 1) {
                    quantityElement.innerText = currentValue - 1;
                }
            }
            
        </script>


            <div class="bluch-container w-100">
                <div class="d-flex bluch gap-2 align-items-center">
                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-check-circle" viewBox="0 0 512 512"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                        </path>
                    </svg>
                    <div>
                        مسموح بتكرار روايح العطر
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
                        أختاري الروايح داخل المجموعة بكل حرية
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
                        مسموح تزودي عدد القطع فوق المجموعة
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
                        سيتم تواصل خدمة العملاء معكي لأتمام طلبك
                    </div>
                </div>
            </div>
            <div class="e-rating-wrapper d-flex gap-2 justify-content-center mt-3" itemprop="ratingValue" content="5"
                role="img" aria-label="Rated 5 out of 5">
                <div class="e-icon">
                    <div class="e-icon-wrapper e-icon-marked">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-star" viewBox="0 0 576 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="e-icon-wrapper e-icon-unmarked">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-star" viewBox="0 0 576 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="e-icon">
                    <div class="e-icon-wrapper e-icon-marked">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-star" viewBox="0 0 576 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="e-icon-wrapper e-icon-unmarked">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-star" viewBox="0 0 576 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="e-icon">
                    <div class="e-icon-wrapper e-icon-marked">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-star" viewBox="0 0 576 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="e-icon-wrapper e-icon-unmarked">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-star" viewBox="0 0 576 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="e-icon">
                    <div class="e-icon-wrapper e-icon-marked">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-star" viewBox="0 0 576 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="e-icon-wrapper e-icon-unmarked">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-star" viewBox="0 0 576 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="e-icon">
                    <div class="e-icon-wrapper e-icon-marked">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-star" viewBox="0 0 576 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="e-icon-wrapper e-icon-unmarked">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-star" viewBox="0 0 576 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper arrows testmonials">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide baloo h-none flex-column">
                    <p class="larg-p sec-color">

                      يا جماعة، لما استخدمت معطر الشعر ده، غير حياتي تمامًا! الروائح بتاعته تحفة بجد، وأهم حاجة إنه طبيعي ومفيهوش ريحة كحول علشان أنا عندي حساسية. شعري بقى ناعم ومعطر طول الوقت، والفيتامين بيديه غذاء رهيب. أنصحكوا بقوة تجربوه!
                    </p>
                    <div class="sec-color bold">
                        منى فهمي
                    </div>
                    <div class="sec-color">
                        مصر الجديدة
                    </div>
                </div>
                <div class="swiper-slide baloo h-none flex-column">
                    <p class="larg-p sec-color">

                      معطر الشعر ده حرفيا انقذ حياتي! معايا دايما في شنطتي في أي مكان. الفلورال مود بتاعه إزاي حلوة كده؟ بحب ريحته جدًا، وأنا بستخدمه يوميًا. عجبني إنه مش بيعمل شعري زيتي وهو لسه بيديه لمعة. انصحكوا تجربوه ومتترددوش!
                    </p>
                    <div class="sec-color bold">
                        مروة رأفت
                        </div>
                    <div class="sec-color">
                        التجمع الخامس 
                    </div>
                </div>
                <div class="swiper-slide baloo h-none flex-column">
                    <p class="larg-p sec-color">

                      انا اشتريت معطر الشعر ده وجربت كل الروائح اللذيذة بتاعته. الكاندى مود أكتر ريحة عجبتني، وكانت برضه مفاجأة إنها حلوة جدًا على هدومي ومش بتسيب بقع. الأهم إنه بيناسب شعري الدهني ومش بيخليه زيتي. وصاحباتي عجبهم جدًا. انصح بشدة بجد!
                    </p>
                    <div class="sec-color bold">
                         ناني محمد
                    </div>
                    <div class="sec-color">
                        الإسكندرية 
                    </div>
                </div>
                <!--<div class="swiper-slide baloo h-none flex-column">-->
                <!--    <p class="larg-p sec-color">-->

                <!--        يا جماعة، لما استخدمت معطر الشعر ده، غير حياتي تمامًا! الروائح بتاعته تحفة بجد، وأهم حاجة إنه-->
                <!--        طبيعي ومفيهوش ريحة كحول علشان أنا عندي حساسية. شعري بقى ناعم ومعطر طول الوقت، والفيتامين بيديه-->
                <!--        غذاء رهيب. أنصحكوا بقوة تجربوه!-->
                <!--    </p>-->
                <!--    <div class="sec-color bold">-->
                <!--        منى فهمي-->
                <!--    </div>-->
                <!--    <div class="sec-color">-->
                <!--        مصر الجديدة-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="swiper-slide baloo h-none flex-column">-->
                <!--    <p class="larg-p sec-color">-->

                <!--        يا جماعة، لما استخدمت معطر الشعر ده، غير حياتي تمامًا! الروائح بتاعته تحفة بجد، وأهم حاجة إنه-->
                <!--        طبيعي ومفيهوش ريحة كحول علشان أنا عندي حساسية. شعري بقى ناعم ومعطر طول الوقت، والفيتامين بيديه-->
                <!--        غذاء رهيب. أنصحكوا بقوة تجربوه!-->
                <!--    </p>-->
                <!--    <div class="sec-color bold">-->
                <!--        منى فهمي-->
                <!--    </div>-->
                <!--    <div class="sec-color">-->
                <!--        مصر الجديدة-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="swiper-slide baloo h-none flex-column">-->
                <!--    <p class="larg-p sec-color">-->

                <!--        يا جماعة، لما استخدمت معطر الشعر ده، غير حياتي تمامًا! الروائح بتاعته تحفة بجد، وأهم حاجة إنه-->
                <!--        طبيعي ومفيهوش ريحة كحول علشان أنا عندي حساسية. شعري بقى ناعم ومعطر طول الوقت، والفيتامين بيديه-->
                <!--        غذاء رهيب. أنصحكوا بقوة تجربوه!-->
                <!--    </p>-->
                <!--    <div class="sec-color bold">-->
                <!--        منى فهمي-->
                <!--    </div>-->
                <!--    <div class="sec-color">-->
                <!--        مصر الجديدة-->
                <!--    </div>-->
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <!-- If we need pagination -->
        </div>
    </section>
    <section class="mt-5">
        <!--<h5 class="title text-center mb-4 main-color">-->
        <!--    المزيد من عروض روزماري-->
        <!--</h5>-->
        <!--<div class="swiper offers px-4">-->
            <!-- Additional required wrapper -->
        <!--    <div class="swiper-wrapper">-->
                <!-- Slides -->
        <!--        <div class="swiper-slide flex-column">-->
        <!--            <img src="./assets2/images/4.webp" alt="">-->
        <!--            <h3>-->
        <!--                <a class="text-center">عروض معطر الشعر</a>-->
        <!--            </h3>-->
        <!--            <p class="text-center baloo main-color">تعرفي على العرض</p>-->
        <!--        </div>-->
        <!--        <div class="swiper-slide flex-column">-->
        <!--            <img src="./assets2/images/4.webp" alt="">-->
        <!--            <h3>-->
        <!--                <a class="text-center">عروض معطر الشعر</a>-->
        <!--            </h3>-->
        <!--            <p class="text-center baloo main-color">تعرفي على العرض</p>-->
        <!--        </div>-->
        <!--        <div class="swiper-slide flex-column">-->
        <!--            <img src="./assets2/images/4.webp" alt="">-->
        <!--            <h3>-->
        <!--                <a class="text-center">عروض معطر الشعر</a>-->
        <!--            </h3>-->
        <!--            <p class="text-center baloo main-color">تعرفي على العرض</p>-->
        <!--        </div>-->
        <!--        <div class="swiper-slide flex-column">-->
        <!--            <img src="./assets2/images/4.webp" alt="">-->
        <!--            <h3>-->
        <!--                <a class="text-center">عروض معطر الشعر</a>-->
        <!--            </h3>-->
        <!--            <p class="text-center baloo main-color">تعرفي على العرض</p>-->
        <!--        </div>-->
        <!--        <div class="swiper-slide flex-column">-->
        <!--            <img src="./assets2/images/4.webp" alt="">-->
        <!--            <h3>-->
        <!--                <a class="text-center">عروض معطر الشعر</a>-->
        <!--            </h3>-->
        <!--            <p class="text-center baloo main-color">تعرفي على العرض</p>-->
        <!--        </div>-->
        <!--    </div>-->
            <!-- If we need pagination -->
        <!--    <div class="swiper-button-prev fourth"></div>-->
        <!--    <div class="swiper-button-next fourth"></div>-->
        <!--</div>-->
<footer class="custom-footer">
    <div class="particles-container"></div>
    <div class="container">
        <div class="copyright">
            All Right Reserved by 
            <a href="https://creatious.online/" target="_blank" rel="noopener noreferrer" class="glowing-text">
                Creatious Marketing Agency
            </a>
        </div>
        <div class="footer-design-element"></div>
    </div>
</footer>

<style>
/* 🌟 Enhanced Footer with Modern Effects */
.custom-footer {
    background: linear-gradient(135deg, rgba(157, 176, 163, 0.9), rgba(120, 140, 130, 0.95));
    padding: 25px 0;
    text-align: center;
    position: relative;
    overflow: hidden;
    box-shadow: 0px -5px 20px rgba(0, 0, 0, 0.15);
    border-top: 1px solid rgba(255, 255, 255, 0.2);
}

/* ✨ Floating Particles Background */
.particles-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: 0;
}

.particles-container::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        radial-gradient(circle at 25% 25%, rgba(255, 255, 255, 0.2) 1px, transparent 1px),
        radial-gradient(circle at 75% 75%, rgba(255, 255, 255, 0.2) 1px, transparent 1px);
    background-size: 20px 20px;
    animation: particleFloat 20s infinite linear;
}

@keyframes particleFloat {
    0% { background-position: 0 0; }
    100% { background-position: 20px 20px; }
}

/* 🌈 Shimmering Light Effect */
.custom-footer::before {
    content: "";
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(
        45deg, 
        rgba(255, 255, 255, 0) 0%,
        rgba(255, 255, 255, 0.05) 25%, 
        rgba(255, 255, 255, 0.1) 50%, 
        rgba(255, 255, 255, 0.05) 75%,
        rgba(255, 255, 255, 0) 100%
    );
    transform: rotate(30deg);
    animation: shimmer 8s ease-in-out infinite;
    z-index: 1;
}

@keyframes shimmer {
    0% { transform: rotate(30deg) translateY(0%); opacity: 0; }
    25% { opacity: 1; }
    50% { transform: rotate(30deg) translateY(100%); opacity: 0; }
    100% { transform: rotate(30deg) translateY(0%); opacity: 0; }
}

/* 🎨 Enhanced Typography */
.custom-footer .copyright {
    position: relative;
    font-size: 18px;
    font-weight: 500;
    color: #fff;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    letter-spacing: 0.5px;
    z-index: 2;
    transition: all 0.3s ease;
}

.custom-footer .copyright:hover {
    transform: translateY(-2px);
}

/* 🔥 Advanced Neon Text Effect */
.glowing-text {
    position: relative;
    color: #fff;
    font-weight: bold;
    text-decoration: none;
    padding: 0 5px;
    transition: all 0.3s ease;
    background: linear-gradient(90deg, #FFF9EA00, #ffa502, #FFF9EA00);
    background-size: 200% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: gradientFlow 3s ease infinite;
    text-shadow: none;
}

.glowing-text::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 2px;
    bottom: -2px;
    left: 0;
    background: linear-gradient(90deg, #FFF9EA00, #ffa502, #FFF9EA00);
    background-size: 200% auto;
    animation: gradientFlow 3s ease infinite;
    transform: scaleX(0);
    transform-origin: bottom right;
    transition: transform 0.3s ease;
}

.glowing-text:hover::after {
    transform: scaleX(1);
    transform-origin: bottom left;
}

@keyframes gradientFlow {
    0% { background-position: 0% center; }
    50% { background-position: 100% center; }
    100% { background-position: 0% center; }
}

/* 🎭 Decorative Element */
.footer-design-element {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: linear-gradient(90deg, #FFF9EA00, #ffa502, #FFF9EA00);
    background-size: 200% auto;
    animation: gradientFlow 3s ease infinite;
    z-index: 2;
}

/* 📱 Enhanced Responsive Design */
@media (max-width: 768px) {
    .custom-footer {
        padding: 20px 15px;
    }

    .custom-footer .copyright {
        font-size: 16px;
    }
    
    .footer-design-element {
        height: 3px;
    }
}

/* 💫 Hover Effects */
.custom-footer:hover::before {
    animation-duration: 4s;
}

.custom-footer:hover .particles-container::before {
    animation-duration: 15s;
}
</style>

<script>
// Add this script to create floating particles
document.addEventListener('DOMContentLoaded', function() {
    const particlesContainer = document.querySelector('.particles-container');
    
    // Create 15 floating particles
    for (let i = 0; i < 15; i++) {
        const particle = document.createElement('span');
        particle.classList.add('particle');
        
        // Random styling
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';
        particle.style.width = (Math.random() * 5 + 2) + 'px';
        particle.style.height = particle.style.width;
        particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
        particle.style.animationDelay = (Math.random() * 5) + 's';
        
        particlesContainer.appendChild(particle);
    }
});

document.addEventListener('DOMContentLoaded', function() {
    // Initialize thumbnail slider
    var thumbsSwiper = new Swiper('#thumbs', {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        breakpoints: {
            320: {
                slidesPerView: 3,
                spaceBetween: 5
            },
            480: {
                slidesPerView: 4,
                spaceBetween: 8
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 10
            }
        }
    });
    
    // Initialize main slider
    var mainSwiper = new Swiper('#main', {
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: thumbsSwiper
        },
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        },
        loop: true
    });
});
</script>

<style>
/* Additional styles for the particles */
.particle {
    position: absolute;
    background-color: rgba(255, 255, 255, 0.5);
    border-radius: 50%;
    pointer-events: none;
    z-index: 1;
    animation: floatParticle linear infinite;
}

@keyframes floatParticle {
    0% {
        transform: translateY(0) translateX(0);
        opacity: 0;
    }
    25% {
        opacity: 0.8;
    }
    75% {
        opacity: 0.5;
    }
    100% {
        transform: translateY(-100px) translateX(20px);
        opacity: 0;
    }
}
</style>
    </section>
    <script src="./assets2/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const swiper = new Swiper('.offers', {
                slidesPerView: 1,
                spaceBetween: 10,
                speed: 400,
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false // Keeps autoplay running after manual interaction
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next.fourth',
                    prevEl: '.swiper-button-prev.fourth',
                },
                breakpoints: {
                    480: { slidesPerView: 2, spaceBetween: 20 },
                    640: { slidesPerView: 2, spaceBetween: 20 },
                    768: { slidesPerView: 3, spaceBetween: 20 }
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            const thumbSwiper = new Swiper("#thumbs", {
                slidesPerView: 3,
                spaceBetween: 10,
                speed: 400,
                loop: true, // Enable loop for thumbnails
                watchSlidesProgress: true,
                watchSlidesVisibility: true,
                breakpoints: {
                    480: { slidesPerView: 3 },
                    640: { slidesPerView: 4 },
                    768: { slidesPerView: 5 }
                }
            });

            const mainSwiper = new Swiper("#main", {
                slidesPerView: 1,
                spaceBetween: 10,
                speed: 400,
                loop: true, // Enable loop for the main slider
                autoplay: { delay: 4000 }, // Autoplay for main slider
                thumbs: {
                    swiper: thumbSwiper, // Link to thumbs
                },
            });

            // Sync looping manually (important)
            mainSwiper.on('slideChange', function () {
                thumbSwiper.slideToLoop(mainSwiper.realIndex);
            });

            thumbSwiper.on('slideChange', function () {
                mainSwiper.slideToLoop(thumbSwiper.realIndex);
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            const swiper = new Swiper('.normalSwiper.arrows', {
                slidesPerView: 1,
                spaceBetween: 10,
                speed: 400,

                loop: true,
                pagination: {
                    el: ".swiper-pagination", // Target pagination container
                    clickable: true, // Allow clicking on bullets
                },
                navigation: {
                    nextEl: '.swiper-button-next.thrd',
                    prevEl: '.swiper-button-prev.thrd',
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
            const swiper = new Swiper('.single', {
                slidesPerView: 1,
                spaceBetween: 10,
                speed: 400,
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false // Keeps autoplay running after manual interaction
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    480: { slidesPerView: 1, spaceBetween: 20 },
                    640: { slidesPerView: 1, spaceBetween: 20 },
                    768: { slidesPerView: 1, spaceBetween: 20 }
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
            const swiper = new Swiper('.testmonials', {
                slidesPerView: 1,
                spaceBetween: 10,
                speed: 400,
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false // Keeps autoplay running after manual interaction
                },
                breakpoints: {
                    480: { slidesPerView: 1, spaceBetween: 20 },
                    640: { slidesPerView: 1, spaceBetween: 20 },
                    768: { slidesPerView: 1, spaceBetween: 20 }
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
            const swiper = new Swiper('.four', {
                slidesPerView: 1,
                spaceBetween: 10,
                speed: 400,
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false // Keeps autoplay running after manual interaction
                },
                pagination: {
                    el: ".swiper-pagination", // Target pagination container
                    clickable: true, // Allow clicking on bullets
                },
                navigation: {
                    nextEl: '.swiper-button-next.nd',
                    prevEl: '.swiper-button-prev.nd',
                },
                breakpoints: {
                    480: { slidesPerView: 2, spaceBetween: 10 },
                    640: { slidesPerView: 2, spaceBetween: 10 },
                    768: { slidesPerView: 3, spaceBetween: 10 },
                    991: { slidesPerView: 3, spaceBetween: 10 },
                    1024: { slidesPerView: 4, spaceBetween: 10 },
                }
            });
        });
    </script>
</body>

</html>