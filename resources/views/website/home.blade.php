@extends('layouts.app')

@section('content')


<link rel="stylesheet" href="{{ asset('website/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/bootstrap.min.css') }}">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('website/assets/css/fontawesome.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('website/assets/css/magnific-popup.min.css') }}">
    <!-- Swiper Js -->
    <link rel="stylesheet" href="{{ asset('website/assets/css/swiper-bundle.min.css') }}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('website/assets/css/style.css') }}">

    <style>
    .testimonial-image {
        width: 100%;
        max-width: 1063px; /* You can change this if needed */
        height: 600px;
        object-fit: cover;
        border-radius: 12px;
    }
</style>
<!--==============================
Hero Area
==============================-->
    <div class="th-hero-wrapper hero-4 slider-area" id="hero">
        <!-- <div class="shape-mockup hero-shape2 jump d-none d-xl-block" data-bottom="0%" data-left="0%"><img src="assets/img/hero/te1.png" alt="shape"></div> -->
        @php
            $homeSetting = \App\Models\HomeSetting::find(5);

            $heroBg3 = optional($homeSetting)->getFirstMediaUrl('hero_bg_3');
            $heroF3  = optional($homeSetting)->getFirstMediaUrl('hero_f3');
            $heroF2  = optional($homeSetting)->getFirstMediaUrl('hero_f2');
        @endphp


        <div class="shape-mockup spin d-none d-xl-block" data-top="11%" data-right="36%">
            @if($heroBg3)
                <img src="{{ Str::replace('storage/app/public/', 'storage/', $heroBg3) }}" alt="shape">
            @else
                <img src="{{ asset('website/assets/img/hero/te1.png') }}" alt="shape">
            @endif
        </div>

        <div class="shape-mockup jump d-none d-xl-block" data-top="27%" data-right="8%">
            @if($heroF3)
                <img src="{{ Str::replace('storage/app/public/', 'storage/', $heroF3) }}" alt="shape" width="83" height="70">
            @else
                <img src="{{ asset('website/assets/img/hero/f3.png') }}" alt="shape" width="83" height="70">
            @endif
        </div>

        <div class="shape-mockup movingX d-none d-xl-block" data-bottom="15%" data-right="13%">
            @if($heroF2)
                <img src="{{ Str::replace('storage/app/public/', 'storage/', $heroF2) }}" alt="shape" width="105" height="69">
            @else
                <img src="{{ asset('website/assets/img/hero/f2.png') }}" alt="shape" width="105" height="69">
            @endif
        </div>

        <!-- <div class="shape-mockup hero-shape3 movingX d-none d-xxl-block" data-top="41%" data-left="35%"><img src="assets/img/shape/shape-13.png" alt="shape"></div> -->
        <div class="container th-container4">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <div class="hero-style4">
                        <span class="sub-title">{{ $homeSettings->hero_subtitle ?? 'روزماري' }}</span>
                        <h1 class="hero-title">{{ $homeSettings->hero_title ?? 'روزماري لمستحضرات التجميل الطبيعية' }}</h1>
                        <p class="hero-text">{{ $homeSettings->hero_description ?? 'اكتشفي جمالك الطبيعي مع مجموعة منتجاتنا المميزة من مستحضرات التجميل الطبيعية' }}</p>
                        <div class="btn-group justify-content-center">

                            <a href="{{ route('shop.index') }}" class="th-btn black-border">تسوق الآن</a>

                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="hero-img">
                        @php
                            $homeSettings = \App\Models\HomeSetting::first();
                        @endphp
                        @php
                            use Illuminate\Support\Str;
                        @endphp

                        @if($homeSettings && $homeSettings->hasMedia('hero_image'))
                            <img class="tilt-active"
                                src="{{ Str::replace('storage/app/public/', 'storage/', $homeSettings->getFirstMediaUrl('hero_image')) }}"
                                alt="{{ $homeSettings->hero_title }}">

                        @endif
                        <!-- <div class="hero-shape" data-bg-src="assets/img/shape/ellipse.png"></div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--======== / Hero Section ========--><!--==============================
Counter Area
==============================-->
<div class="space">
    <div class="container th-container4">
        <div class="row gy-4 justify-content-xl-between align-items-center">
            <div class="col-xl-5" style="text-align: right;">
                @php
                $homeSettings = \App\Models\HomeSetting::first();
                @endphp
                <div class="counter">
                    <h2 class="mb-0">{{ $homeSettings->counter_title ?? '' }}</h2>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="counter-card-wrap" style="text-align: center;">
                    <div class="cilent-box">
                        <span class="review">{{ $homeSettings->review_score ?? '0.0' }}</span>
                        <div class="star">
                            <i class="fa-sharp fa-solid fa-star"></i>
                            <i class="fa-sharp fa-solid fa-star"></i>
                            <i class="fa-sharp fa-solid fa-star"></i>
                            <i class="fa-sharp fa-solid fa-star"></i>
                            <i class="fa-sharp fa-solid fa-star"></i>
                        </div>
                        <h6 class="cilent-box_counter">
                            <span style="font-size: 18px;">{{ $homeSettings->review_count }}</span> تقييم
                        </h6>
                    </div>
                    <div class="divider"></div>
                    <div class="counter-card">
                        <div class="media-body">
                            <h3 class="mb-0">{{ $homeSettings->sales_count ?? '' }}</h3>
                            <h6 style="font-size: 18px;" class="box-text">{{ $homeSettings->sales_title }}</h6>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="counter-card">
                        <div class="media-body">
                            <h3 class="mb-0">{{ $homeSettings->exp_count ?? '' }}</h3>
                            <h6 style="font-size: 18px;" class="box-text">{{ $homeSettings->exp_title }}</h6>
                        </div>
                    </div>
                    <div class="divider"></div>
                </div>
            </div>
        </div>
    </div>
</div>


    <!--==============================
Product Area
                    @php
                        $products = \App\Models\Product::all();
                    @endphp

                    <div class="swiper-wrapper">
    @foreach($products as $product)
        <div class="swiper-slide">
            <div class="product-grid style10">
                <div class="box-img">
                    <img src="{{ asset('uploads/products/' . ($product->image ?? 'default.png')) }}" alt="{{ $product->name }}">
                </div>
                <div class="product-grid-content">
                    <h3 class="box-title">
                        <a href="{{ route('shop.product', $product->slug) }}">{{ $product->name }}</a>
                    </h3>
                    <span class="box-price">
                        {{ number_format($product->price_after ?? $product->price, 2) }}
                        @if($product->discounted_price)
                            <del>{{ number_format($product->discounted_price, 2) }}</del>
                        @endif
                    </span>
                    <div class="woocommerce-product-rating">
                        <div class="star-rating">
                            <span>Rated <strong class="rating">5.00</strong> out of 5</span>
                        </div>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('cart.add', $product->id) }}" class="th-btn white-btn">Order Now</a>
                        <a href="{{ route('wishlist.add', $product->id) }}"><i class="fa-solid fa-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

==============================-->
<section class="product-area14" id="product-sec">
    <div class="container th-container4">
        @php
            $homeSetting = \App\Models\HomeSetting::first();
        @endphp
        <div class="product-area2 bg-white" data-bg-src="{{ $homeSetting->hasMedia('popular_products_bg') ? Str::replace('storage/app/public/', 'storage/', $homeSetting->getFirstMediaUrl('popular_products_bg')) : asset('website/assets/img/bg/back.png') }}">
            <div class="title-area text-center mb-4 mb-md-5">
                <span class="sub-title style2 d-block mb-2">{{ $homeSetting->popular_products_subtitle }}</span>
                <h2 class="sec-title sec-title2 style1 fw-medium text-white px-2">
                    {{ $homeSetting->popular_products_title }}
                </h2>
            </div>

            @if($homeSetting->about_features)
                <div class="feature-wrap text-center mb-4 mb-md-5">
                    <div class="row justify-content-center g-4">
                        @foreach($homeSetting->about_features as $feature)
                            <div class="col-6 col-md-3">
                                <div class="about-feature">
                                    <div class="feature-icon mb-3 mb-md-4">
                                        @php
                                            $icon = Arr::get($feature, 'icon');
                                        @endphp
                                        @if($icon)
                                            <img src="{{ asset('storage/' . $icon) }}" alt="{{ $feature['title'] }}" class="mx-auto d-block" style="max-width: 100%; height: auto;">
                                        @endif
                                    </div>
                                    <!-- <div class="feature-content">
                                        <h3 class="box-title mb-2">{{ $feature['title'] }}</h3>
                                        <p class="feature-text">{{ $feature['text'] }}</p>
                                    </div> -->
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="slider-area">
                <div class="swiper th-slider has-shadow productSlider14" id="productSlider14" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":1},"768":{"slidesPerView":1},"992":{"slidesPerView":2},"1200":{"slidesPerView":2},"1300":{"slidesPerView":3},"1500":{"slidesPerView":4}}}'>
                    <div class="swiper-wrapper">

                        @foreach($products as $product)
                        <div class="swiper-slide">
                            <div class="product-grid style10">
                                <div class="box-img">
                                    @php
                                        $imageUrl = $product->getFirstMediaUrl('product_images');
                                        $fixedPath = $imageUrl ? str_replace('storage/app/public/', 'storage/', $imageUrl) : asset('uploads/products/default.png');
                                    @endphp
                                    <img src="{{ $fixedPath }}" alt="{{ $product->name }}" class="mx-auto">
                                </div>
                                <div class="product-grid-content text-center">
                                    <h3 class="box-title mb-2">
                                        <a href="{{ route('shop.product', $product->slug) }}">{{ $product->name }}</a>
                                    </h3>
                                    <div class="box-price mb-2">
                                        <span class="price-amount">${{ number_format($product->price_after, 2) }}</span>
                                        @if ($product->discounted_price)
                                            <del class="ms-2">${{ number_format($product->discounted_price, 2) }}</del>
                                        @endif
                                    </div>
                                    <div class="woocommerce-product-rating mb-3">
                                        <div class="star-rating mx-auto" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                        </div>
                                        <span class="count d-block mt-1">(19)</span>
                                    </div>
                                    <div class="btn-group justify-content-center">
                                        <a href="{{ route('shop.product', $product->slug) }}" class="th-btn white-btn">
                                            {{ $homeSetting->button_1_text ?? 'View' }}
                                        </a>
                                        <!-- <a href="wishlist.html" class="th-btn white-btn btn-icon">
                                            <i class="fa-solid fa-heart"></i>
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <button data-slider-prev="#productSlider14" class="slider-arrow style4 slider-prev">
                    <i class="fa-solid fa-angle-left"></i>
                </button>
                <button data-slider-next="#productSlider14" class="slider-arrow style4 slider-next">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>

    <!--==============================
Feature Area
==============================-->
    <div class="choose-area overflow-hidden space overflow-hidden" id="feature-sec">
        <!-- <div class="shape-mockup spin d-none d-xl-block" data-top="11%" data-left="10%"><img src="assets/img/shape/shape-14.png" alt="shape"></div> -->
        <!-- <div class="shape-mockup jump d-none d-xl-block" data-bottom="2%" data-right="5%"><img src="assets/img/shape/shape-11.png" alt="shape"></div> -->
        <div class="container">
            <div class="row gy-5 align-items-center align-items-xl-end flex-row-reverse">
                <div class="col-lg-6">
                    <div class="">
                        <div class="title-area">
                            <span class="sub-title">{{ $homeSettings->features_subtitle }}</span>
                            <h2 class="sec-title sec-title2 style1 fw-medium">{{ $homeSettings->features_title}}</h2>

                        </div>
                        <div class="choose-about-wrap">
                            @foreach($homeSettings->feature_items as $feature_item)
                                <div class="choose-about wow fadeInUp">
                                    <div class="choose-about_icon">
                                    <img src="{{ asset('storage/' . $feature_item['icon']) }}" alt="Icon">
                                    </div>
                                    <div class="media-body">
                                        <h3 class="box-title">{{ $feature_item['title'] }}</h3>
                                        <p class="choose-about_text">{{ $feature_item['description'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="choose-image">
                        <div class="img1 tilt-active">
                        <img src="{{ Str::replace('storage/app/public/', 'storage/', $homeSettings->getFirstMediaUrl('features_main_image')) }}" alt="Choose">

                        </div>
                        <div class="shape-1" data-bg-src="assets/img/shape/ellipse2.png"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--==============================
Video Area
==============================-->
<div class="video-area overflow-hidden" style="text-align: center;">
    <img 
        src="{{ asset(Str::replace('storage/app/public/', 'storage/', $homeSettings->getFirstMediaUrl('video_bg'))) }}" 
        alt="video background" 
        style="border-radius: 20px; width: 100%; max-width: 2560px; height: 684px; object-fit: cover; display: block; margin: 0 auto;"
    >

</div> 

<!-- <div class="container" style="position: relative; margin-top: -60px;">
    <div class="video-content1">
        @if($homeSettings->video_url)
            <a href="{{ $homeSettings->video_url }}" class="play-btn style3 popup-video" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <i class="fa-sharp fa-solid fa-play"></i>
            </a>
        @endif
    </div>
</div> -->

<!--==============================
Product Area
==============================-->
<section class="product-area15 space overflow-hidden">
    <div class="container th-container4">
        <div class="title-area text-center mb-30">
            <span class="sub-title style2">{{ $homeSettings->products_subtitle }}</span>
            <h2 class="sec-title style1 sec-title2 fw-medium">{{ $homeSettings->products_title }}</h2>
            <p class="sec-text4">{{ $homeSettings->products_description }}</p>
        </div>

        <div class="nav tab-menu style3 indicator-active justify-content-center mb-45" id="tab-menu1" role="tablist">
            @php
                $categories = \App\Models\HomeCategory::all();
            @endphp
            @foreach($categories as $index => $category)
                <button class="tab-btn th-btn {{ $index === 0 ? 'active' : '' }}"
                        id="nav-{{ $category->id }}-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#nav-{{ $category->id }}"
                        type="button"
                        role="tab"
                        aria-controls="nav-{{ $category->id }}"
                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                    {{ $category->name }}
                </button>
            @endforeach
        </div>

        <div class="tab-content">
            @foreach($categories as $index => $category)
            <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                 id="nav-{{ $category->id }}"
                 role="tabpanel"
                 aria-labelledby="nav-{{ $category->id }}-tab">
                <div class="slider-wrap">
                    <div class="swiper th-slider project-slider15"
                         id="projectSlider{{ $category->id }}"
                         data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1400":{"slidesPerView":"4"}}}'>
                        <div class="swiper-wrapper">
                            @foreach($category->products as $product)
                            <div class="swiper-slide">
                                <div class="product-grid style10">
                                    <div class="box-img">
                                        @php
                                            $imageUrl = $product->getFirstMediaUrl('product_images');
                                            $fixedPath = $imageUrl ? str_replace('storage/app/public/', 'storage/', $imageUrl) : asset('uploads/products/default.png');
                                        @endphp
                                        <img src="{{ $fixedPath }}" alt="{{ $product->name }}">
                                    </div>
                                    <div class="product-grid-content">
                                        <h3 class="box-title">
                                            <a href="{{ route('shop.product', $product->slug) }}">{{ $product->name }}</a>
                                        </h3>
                                        <span class="box-price">
                                            ${{ number_format($product->price_after, 2) }}
                                            @if ($product->discounted_price)
                                                <del>${{ number_format($product->discounted_price, 2) }}</del>
                                            @endif
                                        </span>
                                        <div class="woocommerce-product-rating">
                                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                            </div>
                                            <span class="count">(19)</span>
                                        </div>
                                        <div class="btn-group">
                                            <a href="{{ route('shop.product', $product->slug) }}" class="th-btn white-btn">
                                                {{ $homeSetting->button_1_text ?? 'View' }}
                                            </a>
                                            <a href="{{ route('wishlist.add', $product->id) }}"><i class="fa-solid fa-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

                <!-- Single item -->
                <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">
                    <div class="slider-wrap">
                        <div class="swiper th-slider project-slider15" id="projectSlider16" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1400":{"slidesPerView":"4"}}}'>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="product-grid style12">
                                        <div class="box-img">
                                            <img src="assets/img/product/product_14_1.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Ready Made Coffee</a></h3>
                                            <span class="box-price">$859.00<del>$1259.00</del> </span>
                                            <div class="woocommerce-product-rating">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                        customer rating</span>
                                                </div>
                                                <span class="count">(19) </span>
                                            </div>
                                            <div class="btn-group">
                                                <a href="cart.html" class="th-btn"> Order Now </a>
                                                <i class="fa-solid fa-heart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="swiper-slide">
                                    <div class="product-grid style12">
                                        <div class="box-img">
                                            <img src="assets/img/product/product_14_2.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Hi-tech Coffee Maker</a></h3>
                                            <span class="box-price">$849.00<del>$1159.00</del> </span>
                                            <div class="woocommerce-product-rating">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                        customer rating</span>
                                                </div>
                                                <span class="count">(20) </span>
                                            </div>
                                            <div class="btn-group">
                                                <a href="cart.html" class="th-btn"> Order Now </a>
                                                <i class="fa-solid fa-heart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                             
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single item -->
                <div class="tab-pane fade" id="nav-three" role="tabpanel" aria-labelledby="nav-three-tab">
                    <div class="slider-wrap">
                        <div class="swiper th-slider project-slider15" id="projectSlider17" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1400":{"slidesPerView":"4"}}}'>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="product-grid style12">
                                        <div class="box-img">
                                            <img src="assets/img/product/product_15_1.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Ellipse T-Shirt</a></h3>
                                            <span class="box-price">$859.00<del>$1259.00</del> </span>
                                            <div class="woocommerce-product-rating">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                        customer rating</span>
                                                </div>
                                                <span class="count">(19) </span>
                                            </div>
                                            <div class="btn-group">
                                                <a href="cart.html" class="th-btn"> Order Now </a>
                                                <i class="fa-solid fa-heart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="swiper-slide">
                                    <div class="product-grid style12">
                                        <div class="box-img">
                                            <img src="assets/img/product/product_15_2.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Life Begin T-Shirt</a></h3>
                                            <span class="box-price">$849.00<del>$1159.00</del> </span>
                                            <div class="woocommerce-product-rating">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                        customer rating</span>
                                                </div>
                                                <span class="count">(20) </span>
                                            </div>
                                            <div class="btn-group">
                                                <a href="cart.html" class="th-btn"> Order Now </a>
                                                <i class="fa-solid fa-heart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="swiper-slide">
                                    <div class="product-grid style12">
                                        <div class="box-img">
                                            <img src="assets/img/product/product_15_3.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Coffee T-Shirt</a></h3>
                                            <span class="box-price">$839.00<del>$1259.00</del> </span>
                                            <div class="woocommerce-product-rating">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                        customer rating</span>
                                                </div>
                                                <span class="count">(25) </span>
                                            </div>
                                            <div class="btn-group">
                                                <a href="cart.html" class="th-btn"> Order Now </a>
                                                <i class="fa-solid fa-heart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="swiper-slide">
                                    <div class="product-grid style12">
                                        <div class="box-img">
                                            <img src="assets/img/product/product_15_4.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Script T-Shirt</a></h3>
                                            <span class="box-price">$829.00<del>$1059.00</del> </span>
                                            <div class="woocommerce-product-rating">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                        customer rating</span>
                                                </div>
                                                <span class="count">(28) </span>
                                            </div>
                                            <div class="btn-group">
                                                <a href="cart.html" class="th-btn"> Order Now </a>
                                                <i class="fa-solid fa-heart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="swiper-slide">
                                    <div class="product-grid style12">
                                        <div class="box-img">
                                            <img src="assets/img/product/product_15_1.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Ellipse T-Shirt</a></h3>
                                            <span class="box-price">$859.00<del>$1259.00</del> </span>
                                            <div class="woocommerce-product-rating">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                        customer rating</span>
                                                </div>
                                                <span class="count">(19) </span>
                                            </div>
                                            <div class="btn-group">
                                                <a href="cart.html" class="th-btn"> Order Now </a>
                                                <i class="fa-solid fa-heart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="swiper-slide">
                                    <div class="product-grid style12">
                                        <div class="box-img">
                                            <img src="assets/img/product/product_15_2.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Life Begin T-Shirt</a></h3>
                                            <span class="box-price">$849.00<del>$1159.00</del> </span>
                                            <div class="woocommerce-product-rating">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                        customer rating</span>
                                                </div>
                                                <span class="count">(20) </span>
                                            </div>
                                            <div class="btn-group">
                                                <a href="cart.html" class="th-btn"> Order Now </a>
                                                <i class="fa-solid fa-heart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="swiper-slide">
                                    <div class="product-grid style12">
                                        <div class="box-img">
                                            <img src="assets/img/product/product_15_3.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Coffee T-Shirt</a></h3>
                                            <span class="box-price">$839.00<del>$1259.00</del> </span>
                                            <div class="woocommerce-product-rating">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                        customer rating</span>
                                                </div>
                                                <span class="count">(25) </span>
                                            </div>
                                            <div class="btn-group">
                                                <a href="cart.html" class="th-btn"> Order Now </a>
                                                <i class="fa-solid fa-heart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="swiper-slide">
                                    <div class="product-grid style12">
                                        <div class="box-img">
                                            <img src="assets/img/product/product_15_4.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Script T-Shirt</a></h3>
                                            <span class="box-price">$829.00<del>$1059.00</del> </span>
                                            <div class="woocommerce-product-rating">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                        customer rating</span>
                                                </div>
                                                <span class="count">(28) </span>
                                            </div>
                                            <div class="btn-group">
                                                <a href="cart.html" class="th-btn"> Order Now </a>
                                                <i class="fa-solid fa-heart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single item -->
                <div class="tab-pane fade" id="nav-four" role="tabpanel" aria-labelledby="nav-four-tab">
                    <div class="slider-wrap">
                        <div class="swiper th-slider project-slider15" id="projectSlider18" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1400":{"slidesPerView":"4"}}}'>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="product-grid style12">
                                        <div class="box-img">
                                            <img src="assets/img/product/product_16_1.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Row Coffee Bundle</a></h3>
                                            <span class="box-price">$859.00<del>$1259.00</del> </span>
                                            <div class="woocommerce-product-rating">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                        customer rating</span>
                                                </div>
                                                <span class="count">(19) </span>
                                            </div>
                                            <div class="btn-group">
                                                <a href="cart.html" class="th-btn"> Order Now </a>
                                                <i class="fa-solid fa-heart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="swiper-slide">
                                    <div class="product-grid style12">
                                        <div class="box-img">
                                            <img src="assets/img/product/product_16_2.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Coffee Special Bundle</a></h3>
                                            <span class="box-price">$849.00<del>$1169.00</del> </span>
                                            <div class="woocommerce-product-rating">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                        customer rating</span>
                                                </div>
                                                <span class="count">(20) </span>
                                            </div>
                                            <div class="btn-group">
                                                <a href="cart.html" class="th-btn"> Order Now </a>
                                                <i class="fa-solid fa-heart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="swiper-slide">
                                    <div class="product-grid style12">
                                        <div class="box-img">
                                            <img src="assets/img/product/product_16_3.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Coffee Seed Bundle</a></h3>
                                            <span class="box-price">$839.00<del>$1259.00</del> </span>
                                            <div class="woocommerce-product-rating">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                        customer rating</span>
                                                </div>
                                                <span class="count">(25) </span>
                                            </div>
                                            <div class="btn-group">
                                                <a href="cart.html" class="th-btn"> Order Now </a>
                                                <i class="fa-solid fa-heart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="swiper-slide">
                                    <div class="product-grid style12">
                                        <div class="box-img">
                                            <img src="assets/img/product/product_16_4.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Green Coffee Bundle</a></h3>
                                            <span class="box-price">$829.00<del>$1059.00</del> </span>
                                            <div class="woocommerce-product-rating">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                        customer rating</span>
                                                </div>
                                                <span class="count">(28) </span>
                                            </div>
                                            <div class="btn-group">
                                                <a href="cart.html" class="th-btn"> Order Now </a>
                                                <i class="fa-solid fa-heart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="swiper-slide">
                                    <div class="product-grid style12">
                                        <div class="box-img">
                                            <img src="assets/img/product/product_16_1.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Row Coffee Bundle</a></h3>
                                            <span class="box-price">$859.00<del>$1259.00</del> </span>
                                            <div class="woocommerce-product-rating">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                        customer rating</span>
                                                </div>
                                                <span class="count">(19) </span>
                                            </div>
                                            <div class="btn-group">
                                                <a href="cart.html" class="th-btn"> Order Now </a>
                                                <i class="fa-solid fa-heart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="swiper-slide">
                                    <div class="product-grid style12">
                                        <div class="box-img">
                                            <img src="assets/img/product/product_16_2.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Coffee Special Bundle</a></h3>
                                            <span class="box-price">$849.00<del>$1169.00</del> </span>
                                            <div class="woocommerce-product-rating">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                        customer rating</span>
                                                </div>
                                                <span class="count">(20) </span>
                                            </div>
                                            <div class="btn-group">
                                                <a href="cart.html" class="th-btn"> Order Now </a>
                                                <i class="fa-solid fa-heart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="swiper-slide">
                                    <div class="product-grid style12">
                                        <div class="box-img">
                                            <img src="assets/img/product/product_16_3.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Coffee Seed Bundle</a></h3>
                                            <span class="box-price">$839.00<del>$1259.00</del> </span>
                                            <div class="woocommerce-product-rating">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                        customer rating</span>
                                                </div>
                                                <span class="count">(25) </span>
                                            </div>
                                            <div class="btn-group">
                                                <a href="cart.html" class="th-btn"> Order Now </a>
                                                <i class="fa-solid fa-heart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="swiper-slide">
                                    <div class="product-grid style12">
                                        <div class="box-img">
                                            <img src="assets/img/product/product_16_4.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Green Coffee Bundle</a></h3>
                                            <span class="box-price">$829.00<del>$1059.00</del> </span>
                                            <div class="woocommerce-product-rating">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                        customer rating</span>
                                                </div>
                                                <span class="count">(28) </span>
                                            </div>
                                            <div class="btn-group">
                                                <a href="cart.html" class="th-btn"> Order Now </a>
                                                <i class="fa-solid fa-heart"></i>
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
    </section>
<!--==============================
Testimonial Area
==============================-->
<style>
    .testimonial-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 30px 0px 0px 30px;
    }
    .testi-grid {
        position: relative;
        z-index: 2;
        text-align: left;
        padding: 20px;
        width: 100%;
        max-width: 100%;
        background: #FFFFFF;
        border-radius: 30px 0px 0px 30px;
        height: 600px;
        box-sizing: border-box;
        overflow: hidden;
    }
    .box-avater {
        width: 100%;
        height: 100%;
    }
    @media (min-width: 1200px) {
        .testi-grid {
            padding: 25px;
        }
    }
    
</style>

@php
    use Spatie\MediaLibrary\MediaCollections\Models\Media;
    use App\Models\Testimonial;

    // Get all testimonials with media
    $testimonials = Testimonial::with('media')->get();

    // Get the latest uploaded main testimonial image (right image)
    $latestMainImage = Media::where('collection_name', 'main_testimonial_image')
        ->latest()
        ->first();

    // Get the first testimonial that has a testimonial image (left image)
    $testimonialWithImage = $testimonials->first(function ($t) {
        return $t->hasMedia('testimonial_images');
    });
@endphp

<section class="overflow-hidden" id="testi-sec">
    <div class="container-fiuld">
        <div class="row g-0 justify-content-between">
            {{-- Left Slider (testimonial_images) --}}
            <div class="col-xl-6">
                <div class="slider-area">
                    <div class="swiper th-slider has-shadow testiSlider3" id="testiSliderLeft"
                         data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"1"},"1200":{"slidesPerView":"1"}}}'>
                        <div class="swiper-wrapper">
                            @php
                                $testimonialImages = $testimonials->filter(function ($testimonial) {
                                    return $testimonial->hasMedia('testimonial_images');
                                });
                            @endphp
                            @forelse($testimonialImages as $testimonial)
                                <div class="swiper-slide">
                                    <div class="testi-grid">
                                        <div class="box-profile">
                                            <div class="box-avater">
                                                <img class="testimonial-image"
                                                     src="{{ $testimonial->getFirstMediaUrl('testimonial_images') }}"
                                                     alt="{{ $testimonial->title }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="swiper-slide">
                                    <div class="testi-grid">
                                        <div class="box-profile">
                                            <div class="box-avater">
                                                <img class="testimonial-image" src="assets/img/bg/testi_bg_3.jpg" alt="Default Background">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                        <div class="slider-pagination"></div>
                    </div>
                </div>
            </div>

            {{-- Right Slider (main_testimonial_image) --}}
            <div class="col-xl-6">
                <div class="slider-area">
                    <div class="swiper th-slider has-shadow testiSlider3" id="testiSliderRight"
                         data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"1"},"1200":{"slidesPerView":"1"}}}'>
                        <div class="swiper-wrapper">
                            @php
                                $mainTestimonialImages = Media::where('collection_name', 'main_testimonial_image')
                                    ->latest()
                                    ->get();
                            @endphp
                            @forelse($mainTestimonialImages as $image)
                                <div class="swiper-slide">
                                    <div class="testi-grid">
                                        <div class="box-profile">
                                            <div class="box-avater">
                                                <img class="testimonial-image"
                                                     src="{{ asset('storage/' . $image->id . '/' . $image->file_name) }}"
                                                     alt="{{ $image->name }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="swiper-slide">
                                    <div class="testi-grid">
                                        <div class="box-profile">
                                            <div class="box-avater">
                                                <img class="testimonial-image" src="assets/img/testimonial/testi_3_1.jpg" alt="Default Avatar">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                        <div class="slider-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!--==============================
About Area
==============================-->
<div class="overflow-hidden space" id="about-sec">
    <div class="container th-container4">
        <div class="row gy-4 gy-xxl-5 flex-row-reverse align-items-center">
            <div class="col-xxl-6 order-2 order-xxl-1">
            <div class="title-area text-end text-xxl-end mb-4 pe-xxl-5 me-xxl-5 ps-xxl-5 ms-xxl-4" dir="rtl">
                <span class="sub-title d-block mb-2">{{ $homeSetting->about_subtitle }}</span>
                <h2 class="sec-title sec-title2 style1 fw-medium mb-3">{{ $homeSetting->about_title }}</h2>
                <p class="fs-18 mb-0">{{ $homeSetting->about_description }}</p>
            </div>

                <div class="ps-xxl-5 ms-xxl-3">
                    <div class="about-feature-wrap text-center text-xxl-start">
                        @foreach($homeSetting->about_features as $feature)
                            <div class="about-feature d-flex flex-column flex-xxl-row align-items-center align-items-xxl-start mb-4">
                                <div class="box-icon mb-3 mb-xxl-0 me-xxl-3">
                                    @if(isset($feature['icon']))
                                        <img src="{{ asset('storage/' . $feature['icon']) }}"
                                            alt="{{ $feature['title'] }}"
                                            style="width: 75px; height: 40px;"
                                            class="mx-auto d-block">
                                    @endif
                                </div>
                                <div class="box-content">
                                    <h3 class="box-title mb-2">{{ $feature['title'] }}</h3>
                                    <p class="box-text mb-0">{{ $feature['text'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="btn-group-wrapper mb-4 mb-xxl-0">
    <div class="btn-group justify-content-center justify-content-xxl-start mt-4">
        <a href="{{ $homeSetting->about_button_link }}" class="th-btn black-btn">{{ $homeSetting->about_button_text }}</a>
    </div>
</div>

    <style>
        .btn-group {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .th-btn {
            padding: 10px 20px;
            background-color: #3C50E0; /* مثال على لون الزر */
            color: #fff;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .th-btn:hover {
            background-color: #2d40b2; /* تغيير اللون عند التمرير */
        }

        /* تخصيص الأزرار للموبايل */
        @media (max-width: 768px) {
            .btn-group {
                justify-content: center;
                width: 100%;
            }

            .th-btn {
                font-size: 14px;
                padding: 12px 25px; /* تكبير المسافات في الزر للموبايل */
            }
        }
    </style>

                </div>
            </div>

            <div class="col-xxl-6 order-1 order-xxl-2">
                <div class="img-box1">
                    <div class="img1 tilt-active">
                        @if($homeSetting->getFirstMediaUrl('about_image'))
                        <div class="about-image mb-4 text-center">
                            <img src="{{ $homeSetting->getFirstMediaUrl('about_image') }}"
                                 alt="{{ $homeSetting->about_title }}"
                                 class="img-fluid mx-auto d-block">
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==============================
Brand Area
==============================-->
    <!-- <div class="brand-area " data-bg-src="assets/img/bg/brand_bg_1.jpg">
        <div class="container th-container">
            <div class="swiper th-slider" id="brandSlider4" data-slider-options='{"spaceBetween":0,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"4"},"1300":{"slidesPerView":"5"},"1600":{"slidesPerView":"6"}}}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="brand-box">
                            <a href="">
                                <img class="original" src="assets/img/brand/brand_4_1.svg" alt="Brand Logo">
                                <img class="gray" src="assets/img/brand/brand_4_1.svg" alt="Brand Logo">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-box">
                            <a href="">
                                <img class="original" src="assets/img/brand/brand_4_2.svg" alt="Brand Logo">
                                <img class="gray" src="assets/img/brand/brand_4_2.svg" alt="Brand Logo">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-box">
                            <a href="">
                                <img class="original" src="assets/img/brand/brand_4_3.svg" alt="Brand Logo">
                                <img class="gray" src="assets/img/brand/brand_4_3.svg" alt="Brand Logo">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-box">
                            <a href="">
                                <img class="original" src="assets/img/brand/brand_4_4.svg" alt="Brand Logo">
                                <img class="gray" src="assets/img/brand/brand_4_4.svg" alt="Brand Logo">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-box">
                            <a href="">
                                <img class="original" src="assets/img/brand/brand_4_5.svg" alt="Brand Logo">
                                <img class="gray" src="assets/img/brand/brand_4_5.svg" alt="Brand Logo">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-box">
                            <a href="">
                                <img class="original" src="assets/img/brand/brand_4_6.svg" alt="Brand Logo">
                                <img class="gray" src="assets/img/brand/brand_4_6.svg" alt="Brand Logo">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-box">
                            <a href="">
                                <img class="original" src="assets/img/brand/brand_4_1.svg" alt="Brand Logo">
                                <img class="gray" src="assets/img/brand/brand_4_1.svg" alt="Brand Logo">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-box">
                            <a href="">
                                <img class="original" src="assets/img/brand/brand_4_2.svg" alt="Brand Logo">
                                <img class="gray" src="assets/img/brand/brand_4_2.svg" alt="Brand Logo">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-box">
                            <a href="">
                                <img class="original" src="assets/img/brand/brand_4_3.svg" alt="Brand Logo">
                                <img class="gray" src="assets/img/brand/brand_4_3.svg" alt="Brand Logo">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-box">
                            <a href="">
                                <img class="original" src="assets/img/brand/brand_4_4.svg" alt="Brand Logo">
                                <img class="gray" src="assets/img/brand/brand_4_4.svg" alt="Brand Logo">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-box">
                            <a href="">
                                <img class="original" src="assets/img/brand/brand_4_5.svg" alt="Brand Logo">
                                <img class="gray" src="assets/img/brand/brand_4_5.svg" alt="Brand Logo">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-box">
                            <a href="">
                                <img class="original" src="assets/img/brand/brand_4_6.svg" alt="Brand Logo">
                                <img class="gray" src="assets/img/brand/brand_4_6.svg" alt="Brand Logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<!--==============================
Faq Area
==============================-->
    <div class="" id="faq-sec">
        <div class="container th-container4">
            <div class="faq-area" data-bg-src="{{ $homeSettings->getFirstMediaUrl('faq_bg') }}">
                <!-- <div class="shape-mockup jump d-none d-xl-block" data-top="8%" data-right="5%"><img src="assets/img/shape/shape-11.png" alt="shape"></div> -->
                <!-- <div class="shape-mockup movingX d-none d-xl-block" data-bottom="0%" data-left="0%"><img src="assets/img/shape/shape-12.png" alt="shape"></div> -->
                <div class="row gy-4 justify-content-center">
                    <div class="title-area text-center">
                        <span class="sub-title style2">{{ $homeSettings->faq_subtitle }}</span>
                        <h2 class="sec-title sec-title2 style1 fw-medium" style="color: white;">
                            {{ $homeSettings->faq_title }}
                        </h2>
                    </div>
                    <div class="col-xl-7 text-center text-xl-start">
                        <div class="">
                            <div class="accordion" id="faqAccordion">
                                @foreach($homeSettings->faq_items ?? [] as $index => $faq)
                                    <div class="accordion-card style2 {{ $index === 0 ? 'active' : '' }}">
                                        <div class="accordion-header" id="collapse-item-{{ $index + 1 }}">
                                            <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapse-{{ $index + 1 }}"
                                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                                    aria-controls="collapse-{{ $index + 1 }}">
                                                {{ $faq['question'] }}
                                            </button>
                                        </div>
                                        <div id="collapse-{{ $index + 1 }}"
                                             class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                             aria-labelledby="collapse-item-{{ $index + 1 }}"
                                             data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                <p class="faq-text">{!! nl2br(e($faq['answer'])) !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="faq-form">
                            <form action="mail.php" method="POST" class="contact-form ajax-contact">
                                <div class="title-area mb-24">
                                    <span class="sub-title style2">{{ $homeSettings->faq_form_subtitle }}</span>
                                    <h2 class="sec-title sec-title2 style1">{{ $homeSettings->faq_form_title }}</h2>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="الاسم">
                                    </div>
                                    <div class="form-group col-12">
                                        <input type="email" class="form-control" name="email2" id="email2" placeholder="البريد الالكتروني">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="tel" class="form-control" name="number" id="number" placeholder="رقم الهاتف">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select name="subject" id="subject" class="form-select nice-select">
                                            <option value="" disabled selected hidden>Select</option>
                                            <option value="General Query">General Query</option>
                                            <option value="Help Support">Help Support</option>
                                            <option value="Sales Support">Sales Support</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <textarea name="message" id="message" cols="30" rows="4" class="form-control" placeholder="محتوي الرسالة"></textarea>
                                    </div>
                                    <div class="form-btn col-12">
                                        <button class="th-btn black-btn btn-fw">ارسال</button>
                                    </div>
                                </div>
                                <p class="form-messages mb-0 mt-3"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--==============================
Blog Area
==============================-->
    <section class="space-top" id="blog-sec">
        <div class="container th-container4">
            <div class="title-area text-center">
                <span class="sub-title style2">{{ $homeSettings->blogs_subtitle }}</span>
                   <h2 class="sec-title style1 sec-title2 fw-medium">{{ $homeSettings->blogs_title }}</h2>
                   <div class="button"> <a href="{{ route('blogs.index') }}" class="th-btn black-btn">{{ $homeSettings->blogs_button_text }}</a></div>
            </div>
            <div class="row gy-4 justify-content-center">
            @php
                $blogs = \App\Models\Blog::latest()->take(3)->get();
            @endphp
                @foreach($blogs as $blog)
                <div class="col-xl-4 col-md-6">
                    <div class="blog-card style3">
                        <a href="{{ route('blogs.show', $blog->slug) }}" class="blog-img">
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                        </a>
                        <div class="blog-content">
                            <h3 class="box-title">
                                <a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a>
                            </h3>
                            <div class="blog-meta">
                                <a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->created_at->format('F j, Y') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
<!--==============================
newsletter Area
==============================-->
    <div class="newsletter-area3 overflow-hidden space">
        <!-- <div class="shape-mockup jump d-none d-xl-block" data-bottom="3%" data-left="0%"><img src="{{ asset('website/assets/img/shape/shape-16.png') }}" alt="shape"></div> -->
        <!-- <div class="shape-mockup jump d-none d-xl-block" data-top="5%" data-right="0%"><img src="{{ asset('assets/img/shape/shape-15.png') }}" alt="shape"></div> -->
        <div class="container th-container4">
        <div style="text-align: center;">
                <img 
                src="{{ asset($homeSettings->getFirstMediaUrl('newsletter_image')) }}" 
                alt="shape" 
                class="newsletter-shape" 
                style="display: inline-block; border-radius: 20px; max-width: 100%; height: auto;">
            <!-- <div class="newsletter-content2">
                    <span class="sub-title text-white">{{ $homeSettings->newsletter_title }}</span>
                    <h3 class="sec-title2 text-white fw-medium">
                        {{ $homeSettings->newsletter_description }}
                    </h3> -->
                    <!-- <form class="newsletter-form style2">
                        <div class="form-group">
                            <input class="form-control" type="email" placeholder="your email address" required="">
                            <button type="submit" class="th-btn black-btn"><i class="fa-regular fa-arrow-right-long"></i></button>
                        </div>
                    </form> -->
                <!-- </div> -->
                <!-- <div class="newsletter-image3">
                    <img src="{{ asset('website/assets/img/normal/newsleter2.png') }}" alt="">
                </div> -->
            </div>
        </div>
    </diV>
    <!--==============================
	Footer Area
==============================-->
    <!-- <footer class="footer-wrapper bg-white footer-layout3 footer-layout4">
        <div class="widget-area">
            <div class="container th-container4">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-3">
                        <div class="widget footer-widget">
                            <div class="th-widget-about">
                                <div class="about-logo2 mb-25">
                                    <a href="electronics-shop.html"><img src="{{ asset('website/sassets/img/logo3.svg') }}" alt="Erna"></a>
                                </div>
                                <p class="about-text">We're coffee shop, an inJunative team of food supliers.</p>
                                <div class="info-box style4">
                                    <div class="box-icon">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <p class="box-text">789 Inner Lane, Biyes park, California, USA</p>
                                </div>
                                <div class="info-box style4">
                                    <div class="box-icon">
                                        <img src="{{ asset('website/assets/img/icon/phone4.svg') }}" alt="">
                                    </div>
                                    <p class="box-text">
                                        <a href="tel:+00123456789" class="box-link">+00 123 456 789 <span class="text-theme fw-semibold"> or </span> +00 987
                                            654 012</a>
                                    </p>
                                </div>
                                <div class="info-box style4">
                                    <div class="box-icon">
                                        <i class="fa-sharp fa-solid fa-envelope"></i>
                                    </div>
                                    <p class="box-text">
                                        <a href="mailto:support24@erna.com" class="box-link">support24@erna.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Menu</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="contact.html">Become a Vendor</a></li>
                                    <li><a href="contact.html">Affiliate Program</a></li>
                                    <li><a href="course.html">Privacy Policy</a></li>
                                    <li><a href="course.html">Our Suppliers</a></li>
                                    <li><a href="contact.html">Extended Plan</a></li>
                                    <li><a href="contact.html">Community</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Customer Support</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="contact.html">Help Center</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                    <li><a href="contact.html">Report Abuse</a></li>
                                    <li><a href="contact.html">Submit and Dispute</a></li>
                                    <li><a href="contact.html">Policies & Rules</a></li>
                                    <li><a href="contact.html">Online Shopping</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">My Account</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="contact.html">My Account</a></li>
                                    <li><a href="contact.html">Order History</a></li>
                                    <li><a href="course.html">Shoping Cart</a></li>
                                    <li><a href="course.html">Compare</a></li>
                                    <li><a href="contact.html">Help Ticket</a></li>
                                    <li><a href="contact.html">Wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Daily Groceries</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="contact.html">Dairy & Eggs</a></li>
                                    <li><a href="contact.html">Meat & Seafood</a></li>
                                    <li><a href="course.html">Breakfast Food</a></li>
                                    <li><a href="course.html">Household Supplies</a></li>
                                    <li><a href="contact.html">Bread & Bakery</a></li>
                                    <li><a href="contact.html">Pantry Staples</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Shop on The Go</h3>
                            <div class="widget-content2">
                                <p class="title mb-20">From App Store or Google Play App is available. Get it now</p>
                                <div class="download-btn-wrap style2 d-flex">
                                    <div class="">
                                        <a target="_blank" href="https://www.apple.com/store" class="download-btn">
                                            <img src="{{ asset('website/assets/img/normal/app.png') }}" alt="">
                                        </a>
                                    </div>
                                    <div>
                                        <a target="_blank" href="https://play.google.com/" class="download-btn">
                                            <img src="{{ asset('website/assets/img/normal/play.png') }}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="th-social style2 mt-40">
                                    <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://www.whatsapp.com/"><i class="fab fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container th-container2">
                <div class="row gy-2 align-items-center">
                    <div class="col-lg-6">
                        <p class="copyright-text">Coffee Mate <i class="fal fa-copyright"></i> 2025 <a href="electronics-shop.html">Erna</a>. All Rights Reserved.</p>
                    </div>
                    <div class="col-lg-6 text-center text-lg-end">
                        <div class="footer-card">
                            <span class="footer-title">We Are Acepting</span>
                            <img src="assets/img/shape/cards3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer> -->

    <!--********************************
			Code End  Here
	******************************** -->

    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg>
    </div>

    <!--==============================
modal Area
==============================-->
    <div id="login-form" class="popup-login-register mfp-hide">
        <ul class="nav" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-menu" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="false">Login</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-menu active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">Register</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <h3 class="box-title mb-30">Sign in to your account</h3>
                <div class="th-login-form">
                    <form action="mail.php" method="POST" class="login-form ajax-contact">
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Username or email</label>
                                <input type="text" class="form-control" name="email" id="email" required="required">
                            </div>
                            <div class="form-group col-12">
                                <label>Password</label>
                                <input type="password" class="form-control" name="pasword" id="pasword" required="required">
                            </div>

                            <div class="form-btn mb-20 col-12">
                                <button class="th-btn btn-fw th-radius2 ">Send Message</button>
                            </div>
                        </div>
                        <div id="forgot_url">
                            <a href="my-account.html">Forgot password?</a>
                        </div>
                        <p class="form-messages mb-0 mt-3"></p>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <h3 class="th-form-title mb-30">Sign in to your account</h3>
                <form action="mail.php" method="POST" class="login-form ajax-contact">
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Username*</label>
                            <input type="text" class="form-control" name="usename" id="usename" required="required">
                        </div>
                        <div class="form-group col-12">
                            <label>First name*</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" required="required">
                        </div>
                        <div class="form-group col-12">
                            <label>Last name*</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" required="required">
                        </div>
                        <div class="form-group col-12">
                            <label for="new_email">Your email*</label>
                            <input type="text" class="form-control" name="new_email" id="new_email" required="required">
                        </div>
                        <div class="form-group col-12">
                            <label for="new_email_confirm">Confirm email*</label>
                            <input type="text" class="form-control" name="new_email_confirm" id="new_email_confirm" required="required">
                        </div>
                        <div class="statement">
                            <span class="register-notes">A password will be emailed to you.</span>
                        </div>

                        <div class="form-btn mt-20 col-12">
                            <button class="th-btn btn-fw th-radius2 ">Sign up</button>
                        </div>
                    </div>
                    <p class="form-messages mb-0 mt-3"></p>
                </form>
            </div>
        </div>
    </div><!--==============================
    All Js File
============================== -->

    <!-- Jquery -->
    <script src="{{ asset('website/assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
<!-- Swiper Js -->
<script src="{{ asset('website/assets/js/swiper-bundle.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('website/assets/js/bootstrap.min.js') }}"></script>
<!-- Magnific Popup -->
<script src="{{ asset('website/assets/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Counter Up -->
<script src="{{ asset('website/assets/js/jquery.counterup.min.js') }}"></script>
<!-- Tilt -->
<script src="{{ asset('website/assets/js/tilt.jquery.min.js') }}"></script>
<!-- Isotope Filter -->
<script src="{{ asset('website/assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('website/assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('website/assets/js/jquery-ui.min.js') }}"></script>
<!-- nice select -->
<script src="{{ asset('website/assets/js/nice-select.min.js') }}"></script>

<!-- Gsap -->
<script src="{{ asset('website/assets/js/gsap.min.js') }}"></script>

<!-- Main Js File -->
<script src="{{ asset('website/assets/js/main.js') }}"></script>

@endsection

