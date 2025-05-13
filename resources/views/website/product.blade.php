@extends('layouts.app')

@section('title', $product->meta_title ?? $product->name)

{{-- Basic Meta Tags --}}
@section('meta_description', $product->meta_description)
@section('meta_keywords', $product->meta_keywords)
@section('canonical', $product->canonical_url)

@section('meta_tags')
    <meta name="robots" content="{{ is_array($product->meta_robots) ? implode(', ', $product->meta_robots) : '' }}">
    
    {{-- Open Graph Tags --}}
    <meta property="og:locale" content="{{ $product->og_locale ?? 'ar_AR' }}">
    <meta property="og:type" content="{{ $product->og_type ?? 'product' }}">
    <meta property="og:title" content="{{ $product->og_title ?? $product->meta_title ?? $product->name }}">
    <meta property="og:description" content="{{ $product->og_description ?? $product->meta_description }}">
    <meta property="og:url" content="{{ $product->og_url ?? url()->current() }}">
    <meta property="og:site_name" content="{{ $product->og_site_name }}">
    <meta property="og:updated_time" content="{{ $product->og_updated_time ?? $product->updated_at }}">
    
    @if($product->og_author_url)
        <meta property="article:author" content="{{ $product->og_author_url }}">
    @endif
    
    @if($product->og_section)
        <meta property="article:section" content="{{ $product->og_section }}">
    @endif
    
    @if(is_array($product->og_tags))
        @foreach($product->og_tags as $tag)
            <meta property="article:tag" content="{{ $tag }}">
        @endforeach
    @endif

    @if($product->og_image)
        <meta property="og:image" content="{{ $product->og_image }}">
        @if($product->og_image_secure)
            <meta property="og:image:secure_url" content="{{ $product->og_image_secure }}">
        @endif
        @if($product->og_image_width)
            <meta property="og:image:width" content="{{ $product->og_image_width }}">
        @endif
        @if($product->og_image_height)
            <meta property="og:image:height" content="{{ $product->og_image_height }}">
        @endif
        @if($product->og_image_alt)
            <meta property="og:image:alt" content="{{ $product->og_image_alt }}">
        @endif
        @if($product->og_image_type)
            <meta property="og:image:type" content="{{ $product->og_image_type }}">
        @endif
    @endif

    @if($product->published_time)
        <meta property="article:published_time" content="{{ $product->published_time }}">
    @endif
    
    @if($product->modified_time)
        <meta property="article:modified_time" content="{{ $product->modified_time }}">
    @endif

    {{-- Twitter Card Tags --}}
    <meta name="twitter:card" content="{{ $product->twitter_card ?? 'summary_large_image' }}">
    <meta name="twitter:title" content="{{ $product->twitter_title ?? $product->og_title ?? $product->meta_title ?? $product->name }}">
    <meta name="twitter:description" content="{{ $product->twitter_description ?? $product->og_description ?? $product->meta_description }}">
    
    @if($product->twitter_creator)
        <meta name="twitter:creator" content="{{ $product->twitter_creator }}">
    @endif
    
    @if($product->twitter_image)
        <meta name="twitter:image" content="{{ $product->twitter_image }}">
    @endif
    
    @if($product->twitter_label1)
        <meta name="twitter:label1" content="{{ $product->twitter_label1 }}">
        <meta name="twitter:data1" content="{{ $product->twitter_data1 }}">
    @endif
    
    @if($product->twitter_label2)
        <meta name="twitter:label2" content="{{ $product->twitter_label2 }}">
        <meta name="twitter:data2" content="{{ $product->twitter_data2 }}">
    @endif
@endsection
@section('content')
<!-- Breadcrumb -->
 <!-- إضافة مكتبة Swiper CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<!-- إضافة مكتبة Swiper JavaScript -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<div class="breadcumb-wrapper" data-bg-src="{{ asset('website/assets/img/bg/breadcumb-bg.jpg') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title visually-hidden">{{ $product->name }}</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                <li><a href="{{ route('shop.index') }}">المتجر</a></li>
                <li>{{ $product->name }}</li>
            </ul>
        </div>
    </div>
</div>
<style>

.star-rating {
    display: flex;
    flex-direction: row-reverse; /* علشان RTL */
    gap: 2px;
}

.star-rating i {
    color: #FFD700; /* ذهبي */
    font-size: 18px;
    line-height: 1;
    vertical-align: middle;
}


    .description-content {
    display: -webkit-box;
    -webkit-line-clamp: 3; /* عدد الأسطر */
    -webkit-box-orient: vertical;
    overflow: hidden;
    position: relative;
    transition: max-height 0.3s ease;
}

.description-content.expanded {
    -webkit-line-clamp: unset;
    max-height: none;
    overflow: visible;
}


.fade-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 50px;
    background: linear-gradient(to top, white, transparent);
}

.read-more-btn {
    display: block;
    margin-top: 10px;
    background-color: #000000;
    color: white;
    border: none;
    padding: 8px 12px;
    cursor: pointer;
    border-radius: 5px;
}

    .product-description {
        position: relative;
        margin-bottom: 1em;
    }
    .description-wrap {
        position: relative;
    }

    .fade-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3em;
        background: linear-gradient(to bottom, rgba(255,255,255,0), rgba(255,255,255,1));
        pointer-events: none;
        opacity: 1;
        transition: all 0.3s ease;
    }
    .description-content.expanded + .fade-overlay {
        opacity: 0;
        visibility: hidden;
    }
    .read-more-btn {
        display: inline-block;
        background: none;
        border: none;
        color:rgb(0, 0, 0);
        font-weight: bold;
        cursor: pointer;
        padding: 5px 0;
        font-size: 0.9em;
        margin-top: 0.5em;
        transition: all 0.3s ease;
    }
    .read-more-btn:hover {
        text-decoration: underline;
        opacity: 0.8;
    }
    #main{
        height: 557px;
        margin-bottom:  12px;
    }
    #thumbs{
        height: 100px;
    }
    #thumbs .swiper-slide {
        width : 64px;
        height: 100%;
        aspect-ratio: 1 / 1;
    }
    #thumbs .swiper-slide img {
    width: 100%; 
    height: 100%;
    object-fit: cover;
    aspect-ratio: 1;
    }
    @keyframes eye-look {
    0%, 100% {
        transform: translateX(0) scale(1);
    }
    25% {
        transform: translateX(-2px) scale(1.05);
    }
    50% {
        transform: translateX(2px) scale(1.1);
    }
    75% {
        transform: translateX(-1px) scale(1.05);
    }
}

.eye-animate {
    animation: eye-look 3s ease-in-out infinite;
    transition: transform 0.3s ease-in-out;
    display: inline-block;
}

</style>

<!-- Cart Preview Styles -->
<style>
.cart-preview {
    position: fixed;
    top: 20px;
    right: 20px;
    background: white;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    z-index: 1000;
    min-width: 300px;
    display: none;
    transition: all 0.3s ease;
}

.cart-preview.show {
    display: block;
    animation: slideIn 0.3s ease;
}

@keyframes slideIn {
    from {
        transform: translateY(-20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.cart-preview-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 15px;
    border-bottom: 1px solid #eee;
    padding-bottom: 10px;
}

.cart-preview-item {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 15px;
}

.cart-preview-item img {
    width: 70px;
    height: 70px;
    object-fit: cover;
    border-radius: 4px;
}

.cart-preview-item-details {
    flex: 1;
}

.cart-preview-actions {
    display: flex;
    gap: 10px;
    margin-top: 15px;
}

.cart-preview-actions .th-btn {
    flex: 1;
    text-align: center;
    padding: 8px;
    font-size: 14px;
}

.close-preview {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 20px;
    color: #666;
}
</style>


<!-- Cart Preview -->
<div class="cart-preview" id="cartPreview">
    <div class="cart-preview-header">
        <span class="success-icon">✓</span>
        <h4 style="margin: 0;">تمت الإضافة للسلة</h4>
        <button class="close-preview" onclick="closeCartPreview()">&times;</button>
    </div>
    <div class="cart-preview-item">
        <img id="previewProductImage" src="" alt="">
        <div class="cart-preview-item-details">
            <h5 id="previewProductName" style="margin: 0 0 5px 0;"></h5>
            <p id="previewProductPrice" style="margin: 0; color: #666;"></p>
            <p id="previewProductQuantity" style="margin: 5px 0 0 0; font-size: 14px;"></p>
        </div>
    </div>
    <div class="cart-preview-actions">
        <a href="{{ route('cart.index') }}" class="th-btn">عرض السلة</a>
        <button class="th-btn" onclick="closeCartPreview()">متابعة التسوق</button>
    </div>
</div>

<!--Product Details-->
<section class="product-details space-top space-extra-bottom">
    <div class="container">
        <div class="row gx-60">
            <!-- Product Title for Mobile -->
            <div class="col-12 d-block d-xl-none mb-4">
                <h1 class="product-title">{{ $product->name }}</h1>
            </div>
            
            <div class="col-xl-6 order-1 order-xl-0">
                <div class="product-big-img mb-5 mb-xl-0" style="overflow: unset">
                    @php
                        $fixedPath = str_replace('storage/app/public/', 'storage/', $product->getFirstMediaUrl('product_images'));
                    @endphp
                    <div class="swiper-container">
                        <div class="swiper main" id="main">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                @for ($i = 0; $i < 4; $i++)
                                    <div class="swiper-slide">
                                        <img src="{{ $fixedPath }}" alt="{{ $product->name }}">
                                    </div>
                                @endfor
                            </div>
                            <!-- If we need pagination -->
                        </div>
                        <div class="swiper thumbs" id="thumbs">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                @for ($i = 0; $i < 4; $i++)
                                    <div class="swiper-slide">
                                        <img src="{{ $fixedPath }}" alt="{{ $product->name }}">
                                    </div>
                                @endfor
                            </div>
                            <!-- If we need pagination -->
                        </div>
                        <!-- <div class="mt-4 d-flex justify-content-center">
                            <a href="/" class="button">
                                أشتري الآن
                            </a>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-xl-6 align-self-center order-2 order-xl-1 mt-4 mt-xl-0">
                <div class="product-about">
                    <div class="product-rating">
                        @php
                            $averageRating = $product->reviews()->where('status', 'approved')->avg('rating');
                            $reviewsCount = $product->reviews()->where('status', 'approved')->count();
                        @endphp
                        <div class="star-rating" role="img" aria-label="Rated {{ $averageRating }} out of 5">
                            <span>تقييم <strong class="rating">{{ $averageRating ?? 5 }}</strong> من 5 بناءً على <span class="rating">{{ $reviewsCount ?? 0 }}</span> تقييم</span>
                        </div>
                        <a href="#reviews" class="woocommerce-review-link">({{ $reviewsCount ?? 0 }} تقييم)</a>
                    </div>
                    <h1 class="product-title d-none d-xl-block">{{ $product->name }}</h1>
                    <p class="price">
                        @if($product->discounted_price)
                            <del>{{ number_format($product->price, 2) }} ج.م</del>
                            {{ number_format($product->discounted_price, 2) }} ج.م
                        @else
                            {{ number_format($product->price, 2) }} ج.م
                        @endif
                    </p>

                    <div class="product-description">
                        <div class="description-wrap">
                            <div class="description-content" id="main-description">{!! $product->description !!}</div>
                            <div class="fade-overlay"></div>
                        </div>
                        <button class="read-more-btn" id="main-read-more">قراءة المزيد</button>
                    </div>


                    <script>
                        // Update cart dropdown content
                        function updateCartDropdown() {
                            const cartDropdown = document.getElementById('cartDropdown');
                            if (cartDropdown) {
                                fetch('/cart/items') // You'll need to create this endpoint
                                    .then(response => response.text())
                                    .then(html => {
                                        cartDropdown.innerHTML = html;
                                    });
                            }
                        }

                        // Update cart count
                        function updateCartCount(count) {
                            const cartCountElement = document.getElementById('cart-count');
                            if (cartCountElement) {
                                cartCountElement.textContent = count;
                            }
                        }

                        document.getElementById('main-read-more').addEventListener('click', function () {
                            const content = document.getElementById('main-description');
                            content.classList.toggle('expanded');

                            if (content.classList.contains('expanded')) {
                                this.textContent = 'عرض أقل';
                            } else {
                                this.textContent = 'قراءة المزيد';
                            }
                        });
                        document.addEventListener("DOMContentLoaded", function () {
                            const thumbSwiper = new Swiper("#thumbs", {
                                slidesPerView: 4,
                                spaceBetween: 10,
                                speed: 2000,
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
                                speed: 2000,
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

                    </script>

                    <!-- Cart functionality script -->
                    <script>
                        document.querySelector('.add-to-cart').addEventListener('click', function() {
                            const quantityInput = document.querySelector('.qty-input');
                            const quantity = quantityInput ? parseInt(quantityInput.value) : 1;
                            const slug = this.dataset.productSlug;

                            fetch(`/cart/add/${slug}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: JSON.stringify({ quantity: quantity })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Update cart count
                                    updateCartCount(data.cartCount);
                                    
                                    // Update cart dropdown
                                    updateCartDropdown();
                                    
                                    // Show success message
                                    const productDetails = {
                                        name: '{{ $product->name }}',
                                        image: '{{ $fixedPath }}',
                                        price: '@if($product->discounted_price){{ number_format($product->discounted_price, 2) }}@else{{ number_format($product->price, 2) }}@endif ج.م',
                                        quantity: quantity
                                    };
                                    showCartPreview(productDetails);
                                }
                            })
                            .catch(error => console.error('Error:', error));
                        });
                    </script>

                    <!-- Cart Preview JavaScript -->
                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const addToCartBtn = document.querySelector('.add-to-cart');
                        if (addToCartBtn) {
                            addToCartBtn.addEventListener('click', function() {
                                const quantityInput = document.querySelector('.qty-input');
                                const quantity = quantityInput ? quantityInput.value : 1;
                                
                                const productDetails = {
                                    name: '{{ $product->name }}',
                                    image: '{{ $fixedPath }}',
                                    price: '@if($product->discounted_price){{ number_format($product->discounted_price, 2) }}@else{{ number_format($product->price, 2) }}@endif ج.م',
                                    quantity: quantity
                                };
                                
                                showCartPreview(productDetails);
                            });
                        }

                        function showCartPreview(product) {
                            const preview = document.getElementById('cartPreview');
                            const image = document.getElementById('previewProductImage');
                            const name = document.getElementById('previewProductName');
                            const price = document.getElementById('previewProductPrice');
                            const quantity = document.getElementById('previewProductQuantity');
                            
                            // Update preview content
                            image.src = product.image;
                            name.textContent = product.name;
                            price.textContent = product.price;
                            quantity.textContent = `الكمية: ${product.quantity}`;
                            
                            // Show preview with animation
                            preview.classList.add('show');
                            
                            // Auto hide after 5 seconds
                            setTimeout(closeCartPreview, 5000);
                        }
                        
                        window.closeCartPreview = function() {
                            const preview = document.getElementById('cartPreview');
                            preview.classList.remove('show');
                        }
                    });
                    </script>

                    <div class="gift-section">
                        <span style="font-weight: bold; font-size: 1.2rem; color: #FF6347;">هدية مجانية:</span>
                        <a href="{{ route('shop.product', ['product' => $product->slug]) }}" style="color: #000000; font-weight: bold; text-decoration: none;">
                            منتج <strong>{{ $product->name }}</strong> هدية
                        </a>
                    </div>
                    <br>
                    <span>الحجم: <a href="#"><span class="stock">{{ $product->size  }}مللي</span></a></span>

                        <!-- <div class="checklist">
                            <ul>
                                <li>
                                    <i class="fa-solid fa-eye fa-fw fa-beat" style="color:#000000;"></i>
                                    <span><span id="viewers-count">0</span> أشخاص يشاهدون هذا المنتج الآن</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-box-open fa-fw" style="color:#000000;"></i>
                                    <span>متبقي فقط <span id="stock-count">0</span> قطع من المنتج</span>
                                </li>
                            </ul>
                        </div> -->


                   <div class="checklist">
                       <ul>
                       <li>
                            <i class="fa-solid fa-eye eye-animate" style="color:#000000;"></i>
                            <span><span id="viewers-count" class="counter-animation">0</span> أشخاص يشاهدون هذا المنتج الآن</span>
                        </li>

                           <li>
                               <i class="fa-solid fa-box-archive fa-fw fa-bounce" style="color:#000000;"></i>
                               <span>متبقي فقط <span id="stock-count" class="counter-animation">0</span> قطع من المنتج</span>
                           </li>
                           
                       </ul>
                   </div>
                   
                   <style>
                   .counter-animation {
                       transition: all 0.3s ease-out;
                   }
                   .counter-animation.pulse {
                       transform: scale(1.2);
                       color: #000000;
                   }
                   </style>
                   
                   <script>
                   function getRandomNumber(min, max) {
                       return Math.floor(Math.random() * (max - min + 1)) + min;
                   }
                   
                   function updateCounters() {
                       const elements = {
                           viewers: {
                               el: document.getElementById('viewers-count'),
                               min: 5,
                               max: 25
                           },
                           stock: {
                               el: document.getElementById('stock-count'),
                               min: 3,
                               max: 15
                           },
                           orders: {
                               el: document.getElementById('orders-count'),
                               min: 2,
                               max: 10
                           }
                       };
                   
                       for (const [key, value] of Object.entries(elements)) {
                           const newValue = getRandomNumber(value.min, value.max);
                           value.el.textContent = newValue;
                           value.el.classList.add('pulse');
                           setTimeout(() => {
                               value.el.classList.remove('pulse');
                           }, 300);
                       }
                   }
                   
                   // Initial update
                   updateCounters();
                   
                   // Update every 15 seconds
                   setInterval(updateCounters, 15000);
                   </script>

                    <div class="actions">
                        <div class="quantity">
                            <input type="number" class="qty-input" step="1" min="1" max="100" name="quantity" value="1" title="Qty">
                            <button class="quantity-plus qty-btn"><i class="far fa-chevron-up"></i></button>
                            <button class="quantity-minus qty-btn"><i class="far fa-chevron-down"></i></button>
                        </div>
                        <button type="button" class="th-btn add-to-cart" data-product-slug="{{ $product->slug }}">أضف للسلة</button>
                        <a href="#" class="icon-btn add-to-wishlist" data-product-slug="{{ $product->slug }}"><i class="far fa-heart"></i></a>
                    </div>

                    <div class="product_meta">
                        @if($product->sku)
                            <span class="sku_wrapper">رقم المنتج: <span class="sku">{{ $product->sku }}</span></span>
                        @endif
                        @if($product->category)
                            <span class="posted_in">التصنيف: <a href="{{ route('shop.index', ['category' => $product->category->id]) }}">{{ $product->category->name }}</a></span>
                            <span>الوسوم: <a href="{{ route('shop.index', ['category' => $product->category->id]) }}">{{ $product->category->name }}</a></span>
                        @endif
                        <!-- <span>الحالة: <a href="#"><span class="stock">{{ $product->quantity > 0 ? 'متوفر' : 'غير متوفر' }}</span></a></span> -->
                        <!-- <span>الحجم: <a href="#"><span class="stock">{{ $product->size  }}مللي</span></a></span> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Tabs -->
        <ul class="nav product-tab-style1 mt-4" id="productTab" role="tablist">
            @if($product->benefits)
                <li class="nav-item" role="presentation">
                    <a class="nav-link th-btn active" id="benefits-tab" data-bs-toggle="tab" href="#benefits" role="tab" aria-controls="benefits" aria-selected="true">الفوائد</a>
                </li>
            @endif
            @if($product->ingredients)
                <li class="nav-item" role="presentation">
                    <a class="nav-link th-btn" id="ingredients-tab" data-bs-toggle="tab" href="#ingredients" role="tab" aria-controls="ingredients" aria-selected="false">المكونات</a>
                </li>
            @endif
            @if($product->usage)
                <li class="nav-item" role="presentation">
                    <a class="nav-link th-btn" id="usage-tab" data-bs-toggle="tab" href="#usage" role="tab" aria-controls="usage" aria-selected="false">طريقة الاستخدام</a>
                </li>
            @endif
            @if($product->precautions)
                <li class="nav-item" role="presentation">
                    <a class="nav-link th-btn" id="precautions-tab" data-bs-toggle="tab" href="#precautions" role="tab" aria-controls="precautions" aria-selected="false">الاحتياطات</a>
                </li>
            @endif
            @if($product->advantages)
                <li class="nav-item" role="presentation">
                    <a class="nav-link th-btn" id="advantages-tab" data-bs-toggle="tab" href="#advantages" role="tab" aria-controls="advantages" aria-selected="false">مميزات</a>
                </li>
            @endif
            @if($product->video_link)
                <li class="nav-item" role="presentation">
                    <a class="nav-link th-btn" id="video-tab" data-bs-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="false">فيديو</a>
                </li>
            @endif
            @if($product->notes)
                <li class="nav-item" role="presentation">
                    <a class="nav-link th-btn" id="notes-tab" data-bs-toggle="tab" href="#notes" role="tab" aria-controls="notes" aria-selected="false">ملاحظات</a>
                </li>
            @endif
            <li class="nav-item" role="presentation">
                <a class="nav-link th-btn" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">التقييمات</a>
            </li>
        </ul>

        <div class="tab-content mt-4" id="productTabContent">
            @if($product->benefits)
                <div class="tab-pane fade show active" id="benefits" role="tabpanel" aria-labelledby="benefits-tab">
                    <h3 class="box-title">الفوائد</h3>
                    <div class="description-wrap">
                        <div class="description-content" id="benefits-content">{!! $product->benefits !!}</div>
                        <div class="fade-overlay"></div>
                    </div>
                    <button class="read-more-btn" id="benefits-read-more">قراءة المزيد</button>
                </div>
            @endif

            @if($product->ingredients)
                <div class="tab-pane fade" id="ingredients" role="tabpanel" aria-labelledby="ingredients-tab">
                    <h3 class="box-title">المكونات</h3>
                    <div class="description-wrap">
                        <div class="description-content" id="ingredients-content">{!! $product->ingredients !!}</div>
                        <div class="fade-overlay"></div>
                    </div>
                    <button class="read-more-btn" id="ingredients-read-more">قراءة المزيد</button>
                </div>
            @endif

            @if($product->usage)
                <div class="tab-pane fade" id="usage" role="tabpanel" aria-labelledby="usage-tab">
                    <h3 class="box-title">طريقة الاستخدام</h3>
                    <div class="description-wrap">
                        <div class="description-content" id="usage-content">{!! $product->usage !!}</div>
                        <div class="fade-overlay"></div>
                    </div>
                    <button class="read-more-btn" id="usage-read-more">قراءة المزيد</button>
                </div>
            @endif

            @if($product->precautions)
                <div class="tab-pane fade" id="precautions" role="tabpanel" aria-labelledby="precautions-tab">
                    <h3 class="box-title">الاحتياطات</h3>
                    <div class="description-wrap">
                        <div class="description-content" id="precautions-content">{!! $product->precautions !!}</div>
                        <div class="fade-overlay"></div>
                    </div>
                    <button class="read-more-btn" id="precautions-read-more">قراءة المزيد</button>
                </div>
            @endif

            @if($product->advantages)
                <div class="tab-pane fade" id="advantages" role="tabpanel" aria-labelledby="advantages-tab">
                    <h3 class="box-title">مميزات</h3>
                    <div class="description-wrap">
                        <div class="description-content" id="advantages-content">{!! $product->advantages !!}</div>
                        <div class="fade-overlay"></div>
                    </div>
                    <button class="read-more-btn" id="advantages-read-more">قراءة المزيد</button>
                </div>
            @endif

            @if($product->video_link)
                <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
                    <h3 class="box-title">الفيديو</h3>
                    <div class="description-wrap">
                        <div class="description-content" id="video-content">
                            @php
                                $videoLink = $product->video;
                                if (Str::contains($videoLink, 'youtube.com') || Str::contains($videoLink, 'youtu.be')) {
                                    preg_match("/(?:youtu.be\/|v=)([^&\/\?]+)/", $videoLink, $matches);
                                    $youtubeId = $matches[1] ?? null;
                                }
                            @endphp

                            @if(!empty($youtubeId))
                                <iframe width="100%" height="400" src="https://www.youtube.com/embed/{{ $youtubeId }}" frameborder="0" allowfullscreen></iframe>
                            @else
                                <video width="100%" height="400" controls>
                                    <source src="{{ asset('storage/' . $videoLink) }}" type="video/mp4">
                                    المتصفح لا يدعم تشغيل الفيديو.
                                </video>
                            @endif
                        </div>
                        <div class="fade-overlay"></div>
                    </div>
                </div>
            @endif

            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                <div class="woocommerce-Reviews">
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
            
                    <!-- Review Form -->
                    <div class="th-comment-form">
                        <div class="form-title">
                            <h3 class="blog-inner-title">أضف تقييمك</h3>
                        </div>
                        <form action="{{ route('shop.product.review', $product) }}" method="POST" class="comment-form">
                            @csrf
                            <div class="row">
                                <div class="col-12 form-group">
                                    <label>تقييمك <span class="text-danger">*</span></label>
                                    <select name="rating" class="form-control @error('rating') is-invalid @enderror" required>
                                        <option value="">اختر تقييمك</option>
                                        <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>5 نجوم ⭐⭐⭐⭐⭐</option>
                                        <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4 نجوم ⭐⭐⭐⭐</option>
                                        <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3 نجوم ⭐⭐⭐</option>
                                        <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2 نجوم ⭐⭐</option>
                                        <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1 نجمة ⭐</option>
                                    </select>
                                    @error('rating')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>الاسم <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" placeholder="الاسم" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 form-group">
                                    <label>تعليقك <span class="text-danger">*</span></label>
                                    <textarea name="comment" class="form-control @error('comment') is-invalid @enderror"
                                              rows="4" required>{{ old('comment') }}</textarea>
                                    @error('comment')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 form-group mb-0">
                                    <button type="submit" class="th-btn">
                                        <i class="fas fa-paper-plane me-2"></i>إرسال التقييم
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Display Existing Reviews (لو حابب تعرضهم) -->
                @if($reviews->count() > 0)
                    <div class="th-comments-wrap mt-4">
                        <h3 class="box-title">التقييمات ({{ $product->reviews()->where('status', 'approved')->count() }})</h3>
                        <ul class="comment-list">
                            @foreach($reviews as $review)
                                <li class="review th-comment-item">
                                    <div class="th-post-comment">
                                        <div class="comment-content">
                                            <div class="d-flex align-items-center justify-content-between mb-2" style="gap: 10px; flex-direction: row-reverse;">
                                                <h4 class="name mb-0">{{ $review->name }}</h4>
                                                <div class="star-rating">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($i <= $review->rating)
                                                            <i class="fas fa-star text-warning"></i>
                                                        @else
                                                            <i class="far fa-star text-muted"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                            <span class="commented-on d-block mb-2 text-muted" style="font-size: 14px;">
                                                <i class="far fa-clock"></i>
                                                {{ $review->created_at->translatedFormat('d F Y - h:i A') }}
                                            </span>
                                            <p class="text">{{ $review->comment }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        @if($reviews->hasPages())
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                @if($reviews->onFirstPage())
                                    <button class="th-btn btn-outline disabled opacity-50" disabled>
                                        <i class="fas fa-chevron-right ml-1"></i> السابق
                                    </button>
                                @else
                                    <a href="{{ $reviews->previousPageUrl() }}" class="th-btn btn-outline">
                                        <i class="fas fa-chevron-right ml-1"></i> السابق
                                    </a>
                                @endif

                                @if($reviews->hasMorePages())
                                    <a href="{{ $reviews->nextPageUrl() }}" class="th-btn btn-outline">
                                        التالي <i class="fas fa-chevron-left mr-1"></i>
                                    </a>
                                @else
                                    <button class="th-btn btn-outline disabled opacity-50" disabled>
                                        التالي <i class="fas fa-chevron-left mr-1"></i>
                                    </button>
                                @endif
                            </div>
                        @endif
                    </div>
                @else
                    <p>لا توجد تقييمات حتى الآن. كن أول من يقيم هذا المنتج!</p>
                @endif

                <style>
                    .th-btn.btn-outline {
                        background: transparent;
                        border: 1px solid #3C50E0;
                        color: #3C50E0;
                        padding: 8px 20px;
                        border-radius: 4px;
                        transition: all 0.3s ease;
                        text-decoration: none;
                        cursor: pointer;
                    }
                    .th-btn.btn-outline:hover:not(.disabled) {
                        background: #3C50E0;
                        color: white;
                    }
                    .th-btn.btn-outline.disabled {
                        cursor: not-allowed;
                    }
                </style>

                                </div>
                            </div>


            @if($product->notes)
                <div class="tab-pane fade" id="notes" role="tabpanel" aria-labelledby="notes-tab">
                    <h3 class="box-title">ملاحظات</h3>
                    <div class="description-wrap">
                        <div class="description-content" id="notes-content">{!! $product->notes !!}</div>
                        <div class="fade-overlay"></div>
                    </div>
                    <button class="read-more-btn" id="notes-read-more">قراءة المزيد</button>
                </div>
            @endif
        </div>

                



        <script>
        document.addEventListener("DOMContentLoaded", function () {
            const readMoreButtons = document.querySelectorAll(".read-more-btn");

            readMoreButtons.forEach(button => {
                button.addEventListener("click", function () {
                    const descriptionWrap = this.previousElementSibling;
                    if (descriptionWrap && descriptionWrap.classList.contains("description-wrap")) {
                        const content = descriptionWrap.querySelector(".description-content");
                        if (content) content.classList.add("expanded");

                        const overlay = descriptionWrap.querySelector(".fade-overlay");
                        if (overlay) overlay.style.display = "none";
                    }

                    this.remove(); // شيل الزر
                });
            });
        });

        </script>

        <!-- Related Products -->
        <div class="space-extra-top mb-30">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-auto">
                    <h2 class="sec-title text-center">منتجات مرتبطة</h2>
                </div>
                <div class="col-md d-none d-sm-block">
                    <hr class="title-line">
                </div>
                <div class="col-md-auto d-none d-md-block">
                    <div class="sec-btn">
                        <div class="icon-box">
                            <button data-slider-prev="#productSlider1" class="slider-arrow default"><i class="far fa-arrow-left"></i></button>
                            <button data-slider-next="#productSlider1" class="slider-arrow default"><i class="far fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper th-slider has-shadow" id="productSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'>
                <div class="swiper-wrapper">
                    @foreach($relatedProducts as $related)
                        <div class="swiper-slide">
                            <div class="product-grid style1">
                                <div class="box-img">
                                    @php
                                        $fixedPath = str_replace('storage/app/public/', 'storage/', $related->getFirstMediaUrl('product_images'));
                                    @endphp
                                    <img src="{{ $fixedPath }}" alt="{{ $related->name }}">
                                    @if($related->discounted_price)
                                        <span class="product-tag">تخفيض</span>
                                    @endif

                                </div>
                                <div class="product-grid-content">
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated {{ $related->rating ?? 5 }} out of 5">
                                            <span>تقييم <strong class="rating">{{ $related->rating ?? 5 }}</strong> من 5 بناءً على <span class="rating">{{ $related->reviews_count ?? 0 }}</span> تقييم</span>
                                        </div>
                                        <span class="count">({{ $related->reviews_count ?? 0 }} تقييم)</span>
                                    </div>
                                    <h3 class="box-title">
                                        <a href="{{ route('shop.product', ['product' => $related->slug]) }}">{{ $related->name }}</a>
                                    </h3>
                                    <span class="box-price">
                                        @if($related->discounted_price)
                                            <del>{{ number_format($related->price, 2) }} ج.م</del>
                                            {{ number_format($related->discounted_price, 2) }} ج.م
                                        @else
                                            {{ number_format($related->price, 2) }} ج.م
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-block d-md-none mt-40 text-center">
                <div class="icon-box">
                    <button data-slider-prev="#productSlider1" class="slider-arrow default"><i class="far fa-arrow-left"></i></button>
                    <button data-slider-next="#productSlider1" class="slider-arrow default"><i class="far fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Read More functionality with fade effect
        function initReadMore(contentId, buttonId) {
            const content = document.getElementById(contentId);
            const button = document.getElementById(buttonId);
            const wrap = content.closest('.description-wrap');
            const fadeOverlay = wrap ? wrap.querySelector('.fade-overlay') : null;

            if (!content || !button || !wrap || !fadeOverlay) return;

            // Check if content needs a read more button
            setTimeout(() => {
                const needsReadMore = content.scrollHeight > content.offsetHeight;
                button.style.display = needsReadMore ? 'inline-block' : 'none';
                fadeOverlay.style.display = needsReadMore ? 'block' : 'none';
            }, 100); // Small delay to ensure content is rendered

            button.addEventListener('click', function() {
                content.classList.toggle('expanded');
                button.textContent = content.classList.contains('expanded') ? 'عرض أقل' : 'قراءة المزيد';
                fadeOverlay.style.opacity = content.classList.contains('expanded') ? '0' : '1';
            });
        }

        // Initialize read more for both descriptions
        window.addEventListener('load', function() {
            // Initialize all read more sections
            const sections = [
                { content: 'main-description', button: 'main-read-more' },
                { content: 'tab-description', button: 'tab-read-more' },
                { content: 'benefits-content', button: 'benefits-read-more' },
                { content: 'ingredients-content', button: 'ingredients-read-more' },
                { content: 'usage-content', button: 'usage-read-more' },
                { content: 'precautions-content', button: 'precautions-read-more' },
                { content: 'advantages-content', button: 'advantages-read-more' },
                { content: 'notes-content', button: 'notes-read-more' }
            ];

            sections.forEach(section => {
                initReadMore(section.content, section.button);
            });
        });

        // Viewers and Stock Counter
        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        function animateChange(id) {
            const el = document.getElementById(id);
            el.style.transition = "transform 0.3s, color 0.3s";
            el.style.transform = "scale(1.3)";
            el.style.color = "#e63946";
            setTimeout(() => {
                el.style.transform = "scale(1)";
                el.style.color = "";
            }, 300);
        }

        function updateProductInfo() {
            const viewers = getRandomInt(7, 24);
            const stock = getRandomInt(2, 10);

            document.getElementById('viewers-count').textContent = viewers;
            document.getElementById('stock-count').textContent = stock;

            animateChange('viewers-count');
            animateChange('stock-count');
        }

        updateProductInfo();
        setInterval(updateProductInfo, 15000);

        // Quantity buttons
        document.querySelectorAll('.quantity').forEach(function(el) {
            const input = el.querySelector('.qty-input');
            const plusBtn = el.querySelector('.quantity-plus');
            const minusBtn = el.querySelector('.quantity-minus');

            plusBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const currentValue = parseInt(input.value);
                if (currentValue < parseInt(input.max)) {
                    input.value = currentValue + 1;
                }
            });

            minusBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const currentValue = parseInt(input.value);
                if (currentValue > parseInt(input.min)) {
                    input.value = currentValue - 1;
                }
            });
        });
    });
</script>
@endpush
