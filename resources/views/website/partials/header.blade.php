<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .cart-notification {
        position: fixed;
        top: 80px;
        left: 50%;
        transform: translateX(-50%);
        background: #3C50E0;
        color: white;
        padding: 12px 24px;
        border-radius: 6px;
        z-index: 9999;
        min-width: 300px;
        text-align: center;
        direction: rtl;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .cart-notification.show {
        opacity: 1;
        visibility: visible;
    }

    .cart-notification.success {
        background: #10B981;
    }

    .cart-notification.error {
        background: #EF4444;
    }
</style>

<div id="cartNotification" class="cart-notification">
    <span class="notification-text"></span>
</div>

<script>
    // Touch support for mobile devices
    document.addEventListener('DOMContentLoaded', function() {
        const cartDropdown = document.querySelector('.cart-dropdown-menu');
        const cartToggle = document.querySelector('.icon-btn');

        // Keyboard accessibility
        cartToggle.setAttribute('role', 'button');
        cartToggle.setAttribute('aria-haspopup', 'true');
        cartToggle.setAttribute('aria-expanded', 'false');
        cartToggle.setAttribute('tabindex', '0');
        cartDropdown.setAttribute('role', 'menu');
        
        cartToggle.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                toggleCart();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && cartDropdown.style.visibility === 'visible') {
                closeCart();
            }
        });

        function toggleCart() {
            const isExpanded = cartToggle.getAttribute('aria-expanded') === 'true';
            cartToggle.setAttribute('aria-expanded', !isExpanded);
            
            if (!isExpanded) {
                cartDropdown.style.visibility = 'visible';
                cartDropdown.style.opacity = '1';
                cartDropdown.querySelector('a, button').focus();
            } else {
                closeCart();
            }
        }

        function closeCart() {
            cartDropdown.style.visibility = 'hidden';
            cartDropdown.style.opacity = '0';
            cartToggle.setAttribute('aria-expanded', 'false');
            cartToggle.focus();
        }

        let touchStartY = 0;
        let touchEndY = 0;

        cartDropdown.addEventListener('touchstart', function(e) {
            touchStartY = e.changedTouches[0].screenY;
        }, { passive: true });

        cartDropdown.addEventListener('touchmove', function(e) {
            e.preventDefault(); // Prevent page scroll while interacting with dropdown
        });

        cartDropdown.addEventListener('touchend', function(e) {
            touchEndY = e.changedTouches[0].screenY;
            const swipeDistance = touchStartY - touchEndY;

            // Close dropdown on swipe up
            if (swipeDistance > 50) {
                this.style.opacity = '0';
                this.style.visibility = 'hidden';
                setTimeout(() => {
                    this.style.removeProperty('opacity');
                    this.style.removeProperty('visibility');
                }, 300);
            }
        });
    });

    function showNotification(message, type = 'success') {
        const notification = document.getElementById('cartNotification');
        const text = notification.querySelector('.notification-text');
        
        notification.className = `cart-notification ${type}`;
        text.textContent = message;
        notification.classList.add('show');
        
        setTimeout(() => {
            notification.classList.remove('show');
        }, 3000);
    }
</script>

<header class="th-header header-layout1">
    <style>
        .header-info {
            position: relative;
        }

        .cart-dropdown-menu {
            position: absolute;
            top: calc(100% + 20px);
            right: -10px;
            width: 350px;
            background: #fff;
            padding: 25px;
            box-shadow: 0 5px 30px rgba(0,0,0,0.1);
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.25s ease-in-out;
            z-index: 99;
            border-radius: 8px;
        }

        .cart-dropdown-menu::before {
            content: '';
            position: absolute;
            top: -8px;
            right: 20px;
            width: 16px;
            height: 16px;
            background: #fff;
            transform: rotate(45deg);
            box-shadow: -2px -2px 5px rgba(0,0,0,0.04);
        }

        .header-info:hover .cart-dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }


        @keyframes cartItemRemove {
            0% {
                opacity: 1;
                transform: translateX(0);
            }
            100% {
                opacity: 0;
                transform: translateX(-20px);
            }
        }

        @keyframes cartShake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-2px); }
            75% { transform: translateX(2px); }
        }

        .badge-shake {
            animation: cartShake 0.5s ease-in-out;
        }

        .widget_shopping_cart_content {
            padding: 5px;
        }

        .woocommerce-mini-cart-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            transition: all 0.3s ease;
            transform-origin: right center;
            gap: 15px;
        }

        .woocommerce-mini-cart-item .remove_from_cart_button {
            padding: 5px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            margin: 0 5px;
        }

        .woocommerce-mini-cart-item .remove_from_cart_button:hover {
            background: #f8f8f8;
            color: #EF4444;
        }

        .woocommerce-mini-cart-item > a:not(.remove_from_cart_button) {
            display: flex;
            align-items: center;
            gap: 10px;
            flex: 1;
            text-decoration: none;
            color: #333;
        }

        .woocommerce-mini-cart-item .quantity {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 5px;
            margin-right: auto;
            font-size: 14px;
            color: #666;
        }

        .woocommerce-mini-cart__total {
            margin-top: 20px;
            padding: 15px 0;
            border-top: 2px solid #eee;
            font-weight: bold;
            font-size: 16px;
        }

        .woocommerce-mini-cart__buttons {
            display: grid;
            gap: 10px;
            margin-top: 15px;
        }

        .woocommerce-mini-cart__buttons .th-btn {
            font-size: 14px;
            padding: 10px 20px;
            text-align: center;
            transition: all 0.3s ease;
            border-radius: 4px;
            font-weight: 500;
        }

        .woocommerce-mini-cart__buttons .checkout {
            background: #3C50E0;
            color: white !important;
        }

        .woocommerce-mini-cart__buttons .wc-forward:not(.checkout) {
            background: #f8f8f8;
            color: #333 !important;
        }

        .cart-item-removing {
            animation: cartItemRemove 0.3s ease-out forwards;
        }

        .woocommerce-mini-cart-item img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            margin-left: 15px;
        }

        .remove_from_cart_button {
            color: #666;
            margin-left: 10px;
        }

        .woocommerce-mini-cart__total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 15px 0;
            padding: 15px 0;
            border-top: 1px solid #eee;
        }

        .woocommerce-mini-cart__buttons {
            display: grid;
            gap: 10px;
        }

        .woocommerce-mini-cart__buttons .th-btn {
            text-align: center;
            padding: 10px;
            width: 100%;
        }

        .woocommerce-mini-cart__buttons .checkout {
            background: #3C50E0;
            color: white;
        }

        .woocommerce-mini-cart__empty-message {
            text-align: center;
            padding: 20px 0;
            margin: 0;
            color: #666;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle removing items from cart
            // Show loading indicator on cart updates
            function showLoading() {
                const content = document.querySelector('.widget_shopping_cart_content');
                content.style.opacity = '0.5';
                content.style.pointerEvents = 'none';
            }

            function hideLoading() {
                const content = document.querySelector('.widget_shopping_cart_content');
                content.style.opacity = '1';
                content.style.pointerEvents = 'auto';
            }

            // Update total price display
            function updateTotalPrice(total) {
                const formattedTotal = new Intl.NumberFormat('ar-EG', {
                    style: 'decimal',
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }).format(total);
                
                document.querySelector('.header-info_link').textContent = 'ج.م' + formattedTotal;
                document.querySelector('.woocommerce-mini-cart__total .amount').textContent = 'ج.م' + formattedTotal;
            }

            document.querySelectorAll('.remove_from_cart_button').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const item = this.closest('.mini_cart_item');
                    const productId = this.dataset.productId;

                    if (!productId) {
                        console.error('Product ID not found');
                        return;
                    }

                    showLoading();
                    fetch('/api/cart/remove', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ product_id: productId })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Show success notification
                            showNotification('تم إزالة المنتج من السلة بنجاح', 'success');
                            
                            // Update all cart displays
                            const cartTotal = data.cart_total;
                            document.querySelector('.badge').textContent = data.cart_count;
                            updateTotalPrice(cartTotal);

                            // Update cart item count text
                            const cartCountText = data.cart_count === 0 ? '' :
                                data.cart_count === 1 ? 'منتج واحد' :
                                data.cart_count === 2 ? 'منتجان' :
                                data.cart_count + ' منتجات';
                            
                            const countDisplay = document.querySelector('.cart-count-text');
                            if (countDisplay) {
                                countDisplay.textContent = cartCountText;
                            }
                            
                            // Add remove animation
                            item.classList.add('cart-item-removing');
                            
                            // Animate badge
                            const badge = document.querySelector('.badge');
                            badge.classList.add('badge-shake');
                            setTimeout(() => badge.classList.remove('badge-shake'), 500);

                            // Remove item after animation
                            setTimeout(() => {
                                item.remove();
                                
                                // Trigger subtle shake animation on cart icon
                                const cartIcon = document.querySelector('.icon-btn img');
                                if (cartIcon) {
                                    cartIcon.style.animation = 'cartShake 0.5s ease-in-out';
                                    setTimeout(() => cartIcon.style.animation = '', 500);
                                }
                                
                                // Show empty message if no items left
                                const cartItems = document.querySelectorAll('.mini_cart_item');
                                if (cartItems.length === 0) {
                                    const emptyMessage = '<p class="woocommerce-mini-cart__empty-message">لا توجد منتجات في سلة المشتريات.</p>';
                                    document.querySelector('.widget_shopping_cart_content').innerHTML = emptyMessage;
                                }
                            }, 300);
                        }
                    });
                });
            });
        })
        .catch(error => {
            console.error('Error removing item:', error);
            showNotification('حدث خطأ أثناء إزالة المنتج من السلة. يرجى المحاولة مرة أخرى.', 'error');
        })
        .finally(() => {
            hideLoading();
        });
    </script>

    <!-- <div class="header-top">
        <div class="container th-container">
            <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                <div class="col-lg-4">
                    <div class="header-links">
                        <ul>
                            <li><img src="{{ asset('website/assets/img/icon/phone.svg') }}" alt=""><a href="tel:+00123456789">+00 123 456 789</a></li>
                            <li><i class="fa-sharp fa-solid fa-envelope"></i><a href="mailto:helloerna@mail.com">helloerna@mail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header-right">
                        <div class="header-links">
                            <ul>
                                <li><a href="#">Track Order</a></li>
                                <li><a href="#">Wishlist</a></li>
                            </ul>
                        </div>  
                        
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="menu-top">
        <div class="container th-container">
            <div class="row justify-content-center justify-content-lg-between align-items-center">
                <div class="col-auto">
                    <div class="header-logo d-none d-lg-block">
                        <a href="{{ route('home') }}"><img src="{{ asset('website/assets/img/logo.svg') }}" alt="Erna"></a>
                    </div>
                </div>
                <div class="col-auto d-none d-lg-block me-xl-auto">
                    <div class="header-form">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="currency-menu">
                                    <select class="form-select nice-select">
                                        <option selected="">All Categories</option>
                                        <option>Fashion</option>
                                        <option>Electronics</option>
                                        <option>Furniture</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-auto me-lg-auto">
                                <div class="top-search">
                                    <form class="header-search" action="{{ route('shop.index') }}">
                                        <div class="box-search">
                                            <input type="text" name="search" placeholder="Search for a product or brand..." value="{{ request('search') }}">
                                            <button type="submit" class="th-btn"><i class="far fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="header-info-wrap">
                        <div class="header-info">
                        
                        </div>
                        <div class="header-info">
                            <div class="dropdown">
                                <div class="icon-btn">
                                    <img src="{{ asset('website/assets/img/icon/bag2.svg') }}" alt="">
                                    <span class="badge">{{ session('cart_count', 0) }}</span>
                                </div>
                                <div>
                                    <span class="header-info_label">السلة</span>
                                    <a href="#" class="header-info_link">ج.م{{ number_format(session('cart_total', 0), 2) }}</a>
                                    <div class="cart-dropdown-menu">
                                        <div class="widget woocommerce widget_shopping_cart style2">
                                            <div class="widget_shopping_cart_content">
                                                @if(session('cart_items', []))
                                                    <ul class="woocommerce-mini-cart cart_list product_list_widget">
                                                        @foreach(session('cart_items', []) as $item)
                                                            <li class="woocommerce-mini-cart-item mini_cart_item">
                                                                <a href="#" class="remove remove_from_cart_button" data-product-id="{{ $item['id'] }}">
                                                                    <i class="far fa-times"></i>
                                                                </a>
                                                                <a href="{{ route('shop.product', $item['slug']) }}">
                                                                <img src="{{ asset('storage/' . Str::after($item['image'], 'public/')) }}" alt="{{ $item['name'] }}">

                                                                    {{ $item['name'] }}
                                                                </a>
                                                                <span class="quantity">{{ $item['quantity'] }} ×
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">ج.م</span>
                                                                        {{ number_format($item['price'], 2) }}
                                                                    </span>
                                                                </span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <p class="woocommerce-mini-cart__total total">
                                                        <strong>الإجمالي:</strong>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="woocommerce-Price-currencySymbol">ج.م</span>
                                                            {{ number_format(session('cart_total', 0), 2) }}
                                                        </span>
                                                    </p>
                                                    <p class="woocommerce-mini-cart__buttons buttons">
                                                        <a href="{{ route('cart.index') }}" class="th-btn wc-forward">عرض السلة</a>
                                                        <a href="{{ route('checkout') }}" class="th-btn checkout wc-forward">إتمام الطلب</a>
                                                    </p>
                                                @else
                                                    <p class="woocommerce-mini-cart__empty-message">لا توجد منتجات في سلة المشتريات.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sticky-wrapper">
        <div class="menu-area">
            <div class="container th-container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto me-xl-auto">
                        <nav class="main-menu d-none d-lg-inline-block">
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('home') }}">Home</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('shop.index') }}">Shop</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('blogs.index') }}">Blog</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('about') }}">About Us</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('contact') }}">Contact</a>
                                                        </li>
                                                    </ul>
                                                </nav>
                        <div class="header-logo d-block d-lg-none">
                            <a href="{{ route('home') }}"><img src="{{ asset('website/assets/img/logo.svg') }}" alt="Erna"></a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="call-btn d-none d-lg-inline-flex">
                            <div class="box-icon">
                                <img src="{{ asset('website/assets/img/icon/truck.svg') }}" alt="">
                            </div>
                            <div class="media-body">
                                <span class="box-label">Free Shipping</span>
                                <h3 class="box-link mb-0">Over Order $280</h3>
                            </div>
                        </div>
                        <button type="button" class="th-menu-toggle d-block d-lg-none">
                            <i class="far fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>