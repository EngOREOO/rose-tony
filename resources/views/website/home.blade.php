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

<!--==============================
Hero Area
==============================-->
    <div class="th-hero-wrapper hero-4 slider-area" id="hero">
        <!-- <div class="shape-mockup hero-shape2 jump d-none d-xl-block" data-bottom="0%" data-left="0%"><img src="assets/img/hero/te1.png" alt="shape"></div> -->
        <div class="shape-mockup spin d-none d-xl-block" data-top="11%" data-right="36%"><img src="{{asset('website/assets/img/hero/te1.png') }}" alt="shape"></div>
        <div class="shape-mockup jump d-none d-xl-block" data-top="27%" data-right="8%">
            <img src="{{ asset('website/assets/img/hero/f3.png') }}" alt="shape" width="83" height="70">
        </div>
        <div class="shape-mockup movingX d-none d-xl-block" data-bottom="15%" data-right="13%">
            <img src="{{ asset('website/assets/img/hero/f2.png') }}" alt="shape" width="105" height="69">
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
        <div class="row gy-4 justify-content-xl-between">
            <div class="col-xl-5">
                @php
                $homeSettings = \App\Models\HomeSetting::first();
                @endphp
                <div class="counter">
                    <h2 class="mb-0">{{ $homeSettings->counter_title ?? '' }}</h2>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="counter-card-wrap">
                    <div class="cilent-box">
                        <span class="review">{{ $homeSettings->review_score ?? '0.0' }}</span>
                        <div class="star">
                            <i class="fa-sharp fa-solid fa-star"></i>
                            <i class="fa-sharp fa-solid fa-star"></i>
                            <i class="fa-sharp fa-solid fa-star"></i>
                            <i class="fa-sharp fa-solid fa-star"></i>
                            <i class="fa-sharp fa-solid fa-star"></i>
                        </div>
                        <p class="cilent-box_counter">
                            <span style="font-size: 18px;" class="counter-number">{{ $homeSettings->review_count }}</span> تقييم
                        </p>
                    </div>
                    <div class="divider"></div>
                    <div class="counter-card">
                        <div class="media-body">
                            <h3 class="box-number">
                            <h3 class="mb-0">{{ $homeSettings->sales_count ?? '' }}</h3>
                            </h3>
                            <p style="font-size: 18px;" class="box-text">{{ $homeSettings->sales_title }}</p>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="counter-card">
                        <div class="media-body">
                            <h3 class="box-number">
                                <h3 class="mb-0">{{ $homeSettings->exp_count ?? '' }}</h3>
                            </h3>
                            <p style="font-size: 18px;" class="box-text">{{ $homeSettings->exp_title }}</p>

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
        <div class="shape-mockup jump d-none d-xl-block" data-top="10%" data-right="2%"><img src="assets/img/shape/shape-12.png" alt="shape"></div>
        <div class="container th-container4">
            <div class="product-area2  bg-white" data-bg-src="{{ asset('website/assets/img/bg/back.png') }}">
                <div class="title-area text-center mb-30">
                    <span class="sub-title style2">Premium Coffee</span>
                    <h2 class="sec-title sec-title2 style1  fw-medium">Popular Products</h2>
                </div>
                <div class="slider-area">
                    <div class="swiper th-slider has-shadow  productSlider14" id="productSlider14" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"2"},"1300":{"slidesPerView":"3"},"1500":{"slidesPerView":"4"}}}'>
                        <div class="swiper-wrapper">

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
                                    <h3 class="box-title"><a href="shop-details.html">{{ $product->name }}</a></h3>
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
                                            {{ $homeSettings->button_1_text ?? 'View' }}
                                        </a>
                                        <a href="wishlist.html"><i class="fa-solid fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>



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
        <div class="shape-mockup spin d-none d-xl-block" data-top="11%" data-left="10%"><img src="assets/img/shape/shape-14.png" alt="shape"></div>
        <div class="shape-mockup jump d-none d-xl-block" data-bottom="2%" data-right="5%"><img src="assets/img/shape/shape-11.png" alt="shape"></div>
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
                                        <img src="{{ asset('storage/assets/img/' . $feature_item['icon']) }}" alt="image">
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
                            <img src="assets/img/normal/choose_1.png" alt="Choose">
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
    <div class="video-area overflow-hidden" data-bg-src="{{ $homeSettings->getFirstMediaUrl("video_bg") }}">
        <div class="container">
            <div class="video-content1">
                <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn style3 popup-video"><i class="fa-sharp fa-solid fa-play"></i></a>
            </div>
        </div>
    </div>
<!--==============================
Product Area
==============================-->
    <section class="product-area15 space overflow-hidden">
        <div class="shape-mockup spin d-none d-xl-block" data-bottom="5%" data-left="2%"><img src="assets/img/shape/shape-14.png" alt="shape"></div>
        <div class="shape-mockup movingX d-none d-xl-block" data-top="25%" data-right="2%"><img src="assets/img/shape/shape-11.png" alt="shape"></div>
        <div class="container th-container4">
            <div class="title-area text-center mb-30">
                <span class="sub-title style2">{{ $homeSettings->products_subtitle }}</span>
                <h2 class="sec-title style1 sec-title2 fw-medium">{{ $homeSettings->products_title }}</h2>
                <p class="sec-text4">{{ $homeSettings->products_description }}</p>
            </div>

            <div class="nav tab-menu style3 indicator-active justify-content-center mb-45" id="tab-menu1" role="tablist">
                <button class="tab-btn th-btn active" id="nav-one-tab" data-bs-toggle="tab" data-bs-target="#nav-one" type="button" role="tab" aria-controls="nav-one" aria-selected="true">Coffee Bean</button>
                <button class="tab-btn th-btn" id="nav-two-tab" data-bs-toggle="tab" data-bs-target="#nav-two" type="button" role="tab" aria-controls="nav-two" aria-selected="false">Accessories</button>
                <button class="tab-btn th-btn" id="nav-three-tab" data-bs-toggle="tab" data-bs-target="#nav-three" type="button" role="tab" aria-controls="nav-three" aria-selected="false">Apparel</button>
                <button class="tab-btn th-btn" id="nav-four-tab" data-bs-toggle="tab" data-bs-target="#nav-four" type="button" role="tab" aria-controls="nav-four" aria-selected="false">Instant Coffee</button>
            </div>

            <div class="tab-content">
                <!-- Single item -->
                <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                    <div class="slider-wrap">
                        <div class="swiper th-slider project-slider15" id="projectSlider15" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1400":{"slidesPerView":"4"}}}'>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="product-grid style12">
                                        <div class="box-img">
                                            <img src="assets/img/product/product_8_1.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Caramel Ribbon</a></h3>
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
                                            <img src="assets/img/product/product_8_2.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Spice Iceland Blend</a></h3>
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
                                            <img src="assets/img/product/product_8_3.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Honduras Puente</a></h3>
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
                                            <img src="assets/img/product/product_8_4.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Col Brew Blend</a></h3>
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
                                            <img src="assets/img/product/product_8_1.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Caramel Ribbon</a></h3>
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
                                            <img src="assets/img/product/product_8_2.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Spice Iceland Blend</a></h3>
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
                                            <img src="assets/img/product/product_8_3.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Honduras Puente</a></h3>
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
                                            <img src="assets/img/product/product_8_4.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Col Brew Blend</a></h3>
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


                                <div class="swiper-slide">
                                    <div class="product-grid style12">
                                        <div class="box-img">
                                            <img src="assets/img/product/product_14_3.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Coffee Maker</a></h3>
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
                                            <img src="assets/img/product/product_14_4.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Techno Coffee Maker</a></h3>
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


                                <div class="swiper-slide">
                                    <div class="product-grid style12">
                                        <div class="box-img">
                                            <img src="assets/img/product/product_14_3.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Coffee Maker</a></h3>
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
                                            <img src="assets/img/product/product_14_4.png" alt="menu Image">
                                        </div>
                                        <div class="product-grid-content">
                                            <h3 class="box-title"><a href="shop-details.html">Techno Coffee Maker</a></h3>
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
    </section><!--==============================
Testimonial Area
==============================-->
    <section class="overflow-hidden overflow-hidden" id="testi-sec">
        <div class="container-fiuld">
            <div class="row g-0 justify-content-between">
                <div class="col-xl-6">
                    <div class="testi-image">
                        <img src="assets/img/bg/testi_bg_3.jpg" alt="">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="slider-area">
                        <div class="swiper th-slider has-shadow testiSlider3 " id="testiSlider3" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"1"},"1200":{"slidesPerView":"1"}}}'>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testi-grid">
                                        <div class="box-quote">
                                            <img src="assets/img/icon/quote3.svg" alt="">
                                        </div>
                                        <p class="box-text">The coffee mate vision extends beyond mere “Mate” sales. We aspire to give individuals the energy to feel free. Through our mission, to support artists, athletes, communities, and all who embody the essence of Canada’s.</p>
                                        <div class="box-profile">
                                            <div class="box-avater">
                                                <img src="assets/img/testimonial/testi_3_1.jpg" alt="Avater">
                                            </div>
                                            <div class="media-body">
                                                <h3 class="box-title">Edward Sunny</h3>
                                                <p class="box-desig">Coffee Lover</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testi-grid">
                                        <div class="box-quote">
                                            <img src="assets/img/icon/quote3.svg" alt="">
                                        </div>
                                        <p class="box-text">It seems like you're referring to a vision or mission statement for Coffee-mate or a brand similar to it, which extends beyond just selling products. The focus seems to be on empowering individuals, fostering creativity or Coffee-mate</p>
                                        <div class="box-profile">
                                            <div class="box-avater">
                                                <img src="assets/img/testimonial/testi_3_2.jpg" alt="Avater">
                                            </div>
                                            <div class="media-body">
                                                <h3 class="box-title">Sumaiya Zara</h3>
                                                <p class="box-desig">Managing Director</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testi-grid">
                                        <div class="box-quote">
                                            <img src="assets/img/icon/quote3.svg" alt="">
                                        </div>
                                        <p class="box-text">The Coffee-mate vision goes beyond simply selling products. We aim to empower individuals with the energy to live freely. Our mission is to support artists, athletes, communities, and all those who embody the spirit of Canada</p>
                                        <div class="box-profile">
                                            <div class="box-avater">
                                                <img src="assets/img/testimonial/testi_3_3.jpg" alt="Avater">
                                            </div>
                                            <div class="media-body">
                                                <h3 class="box-title">Agelina Margret</h3>
                                                <p class="box-desig">CEO Of Company</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--==============================
About Area
==============================-->
    <div class="overflow-hidden space" id="about-sec">
        <div class="shape-mockup spin d-none d-xl-block" data-top="11%" data-right="10%"><img src="assets/img/shape/shape-14.png" alt="shape"></div>
        <div class="shape-mockup jump d-none d-xl-block" data-bottom="8%" data-right="30%"><img src="assets/img/shape/shape-11.png" alt="shape"></div>
        <div class="container th-container4">
            <div class="row gy-50 flex-row-reverse align-items-center">
                <div class="col-xxl-6">
                    <div class="img-box1">
                        <div class="img1 tilt-active">
                            <img src="assets/img/normal/about_1.png" alt="About">
                        </div>
                        <div class="shape2"><img src="assets/img/shape/ellipse3.png" alt=""></div>
                        <div class="about-item">
                            <div class="about-img">
                                <img src="assets/img/normal/about-img.png" alt="">
                            </div>
                            <div class="box-content">
                                <h3 class="box-title">Michel Smith</h3>
                                <p class="box-text">Coffee is on of the most successful company...
                                    customer realationship is very good.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6">
                    <div class="title-area mb-4 pe-xxl-5 me-xxl-5 ps-xxl-5 ms-xxl-4">
                        <span class="sub-title">About The Coffee</span>
                        <h2 class="sec-title sec-title2 style1 fw-medium">We care about the quality of our products</h2>
                        <p class="fs-18">Drinking coffee is one of the best global things you do each days here i
                            can spend a long and comfortable time with this workspace facilities</p>
                    </div>
                    <div class="ps-xxl-5 ms-xxl-3">
                        <div class="about-feature-wrap">
                            <div class="about-feature">
                                <div class="box-icon">
                                    <img src="assets/img/icon/about_1_1.svg" alt="Icon">
                                </div>
                                <div class="box-content">
                                    <h3 class="box-title">Active Community</h3>
                                    <p class="box-text">You can reach out whenever you want</p>
                                </div>
                            </div>
                            <div class="about-feature">
                                <div class="box-icon">
                                    <img src="assets/img/icon/about_1_2.svg" alt="Icon">
                                </div>
                                <div class="box-content">
                                    <h3 class="box-title">Premium Quality</h3>
                                    <p class="box-text">A premium quality coffee is what our customers deserve</p>
                                </div>
                            </div>
                            <div class="about-feature">
                                <div class="box-icon">
                                    <img src="assets/img/icon/about_1_3.svg" alt="Icon">
                                </div>
                                <div class="box-content">
                                    <h3 class="box-title">The Organic Products</h3>
                                    <p class="box-text">We worked a lot to makie a greate experience</p>
                                </div>
                            </div>
                            <div class="about-feature">
                                <div class="box-icon">
                                    <img src="assets/img/icon/about_1_4.svg" alt="Icon">
                                </div>
                                <div class="box-content">
                                    <h3 class="box-title">The Best Materials</h3>
                                    <p class="box-text">Our product is made by premium materials</p>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group">
                            <a href="contact.html" class="th-btn black-btn">Purchase now</a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div><!--==============================
Brand Area
==============================-->
    <div class="brand-area " data-bg-src="assets/img/bg/brand_bg_1.jpg">
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
    </div><!--==============================
Faq Area
==============================-->
    <div class="" id="faq-sec">
        <div class="container th-container4">
            <div class="faq-area" data-bg-src="assets/img/bg/faq_bg_1.jpg">
                <div class="shape-mockup jump d-none d-xl-block" data-top="8%" data-right="5%"><img src="assets/img/shape/shape-11.png" alt="shape"></div>
                <div class="shape-mockup movingX d-none d-xl-block" data-bottom="0%" data-left="0%"><img src="assets/img/shape/shape-12.png" alt="shape"></div>
                <div class="row gy-4 justify-content-center">
                    <div class="title-area text-center"><span class="sub-title style2">FAQ</span>
                        <h2 class="sec-title sec-title2 style1 fw-medium">Frequently Asked Questions</h2>
                        <div class="button"><a href="blog.html" class="th-btn black-btn">Visit More FAQ</a></div>
                    </div>
                    <div class="col-xl-7 text-center text-xl-start">
                        <div class="">
                            <div class="accordion" id="faqAccordion">


                                <div class="accordion-card style2 active">
                                    <div class="accordion-header" id="collapse-item-1">
                                        <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">What is coffe mate?</button>
                                    </div>
                                    <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="collapse-item-1" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            <p class="faq-text">Coffee Mate is a brand of non-dairy creamers used to enhance the flavor and creaminess of coffee. It is made from a combination of water, sugar, vegetable oils, and other ingredients, such as stabilizers and flavorings. Coffee Mate is popular for its convenience and long shelf life, as it can be stored without refrigeration until opened.</p>
                                        </div>
                                    </div>
                                </div>


                                <div class="accordion-card style2 ">
                                    <div class="accordion-header" id="collapse-item-2">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">What are the benefits of coffee mate?</button>
                                    </div>
                                    <div id="collapse-2" class="accordion-collapse collapse " aria-labelledby="collapse-item-2" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            <p class="faq-text"><span>1. Rich in antoxidants and nutrients</span>
                                                <span>2. Can boost energy and increase mental alertness</span>
                                                <span>3. Regulates energy levels</span>
                                                <span>4. Increased sport recuperation</span>
                                                <span> 5. Anti- inflamamatory</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <div class="accordion-card style2 ">
                                    <div class="accordion-header" id="collapse-item-3">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">Is it safe to drink coffee mate everyday?</button>
                                    </div>
                                    <div id="collapse-3" class="accordion-collapse collapse " aria-labelledby="collapse-item-3" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            <p class="faq-text"><span>1.Nutritional Content</span>
                                                <span>2. Dietary Restrictions</span>
                                                <span>3. Artificial Ingredients</span>
                                                <span>4. Moderation</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <div class="accordion-card style2 ">
                                    <div class="accordion-header" id="collapse-item-4">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">How will coffee drinks look in 2025?</button>
                                    </div>
                                    <div id="collapse-4" class="accordion-collapse collapse " aria-labelledby="collapse-item-4" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            <p class="faq-text"><span>1. Sustainability Focus</span>
                                                <span>2. Health-Conscious Options</span>
                                                <span>3. Customization and Personalization</span>
                                                <span>4. InJunative Flavors</span>
                                                <span> 5. Cold Brew and Nitro Drinks</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <div class="accordion-card style2 ">
                                    <div class="accordion-header" id="collapse-item-5">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-5" aria-expanded="false" aria-controls="collapse-5">Why and how you should do it?</button>
                                    </div>
                                    <div id="collapse-5" class="accordion-collapse collapse " aria-labelledby="collapse-item-5" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            <p class="faq-text"><span>1.Why and How You Should Drink Coffee:

                                                    Why: Coffee can boost energy levels, improve mental alertness, and provide antioxidants.
                                                    How: Enjoy it black for fewer calories, or add milk or sweeteners based on personal preference. Consider brewing methods like French press, pour-over, or espresso for variety.</span>
                                                <span>2. Why and How You Should Exercise:

                                                    Why: Regular exercise improves physical health, boosts mood, and reduces stress.
                                                    How: Start with a balanced routine that includes cardio, strength training, and flexibility exercises. Aim for at least 150 minutes of moderate-intensity exercise per week.</span>
                                                <span>3.Why and How You Should Meditate:

                                                    Why: Meditation can reduce stress, enhance concentration, and promote emotional well-being.
                                                    How: Set aside a few minutes daily to sit quietly, focus on your breath, and allow thoughts to come and go without judgment.</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <div class="accordion-card style2 ">
                                    <div class="accordion-header" id="collapse-item-6">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-6" aria-expanded="false" aria-controls="collapse-6">How do community fancy experience?</button>
                                    </div>
                                    <div id="collapse-6" class="accordion-collapse collapse " aria-labelledby="collapse-item-6" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            <p class="faq-text"><span>1. Curated Events</span>
                                                <span>2. Art and Culture</span>
                                                <span>3. Gastronomy</span>
                                                <span>4. Thematic Gatheringss</span>
                                                <span> 5. Community Spaces</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="faq-form">
                            <form action="mail.php" method="POST" class="contact-form ajax-contact">
                                <div class="title-area mb-24">
                                    <span class="sub-title style2">Get More Update</span>
                                    <h2 class="sec-title sec-title2 style1">Send Us a Message</h2>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                    </div>
                                    <div class="form-group col-12">
                                        <input type="email" class="form-control" name="email2" id="email2" placeholder="Email Address">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="tel" class="form-control" name="number" id="number" placeholder="Phone Number">
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
                                        <textarea name="message" id="message" cols="30" rows="4" class="form-control" placeholder="Your Message"></textarea>
                                    </div>
                                    <div class="form-btn col-12">
                                        <button class="th-btn black-btn btn-fw">Send Message</button>
                                    </div>
                                </div>
                                <p class="form-messages mb-0 mt-3"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--==============================
Blog Area
==============================-->
    <section class="space-top" id="blog-sec">
        <div class="container th-container4">
            <div class="title-area text-center">
                <span class="sub-title style2">Blog & News</span>
                <h2 class="sec-title style1 sec-title2 fw-medium">Our Community</h2>
                <div class="button"> <a href="blog.html" class="th-btn black-btn">View All Articles</a></div>
            </div>
            <div class="row gy-4 justify-content-center">
                <div class="col-xl-4 col-md-6">
                    <div class="blog-card style3">
                        <a href="blog-details.html" class="blog-img">
                            <img src="assets/img/blog/blog_3_1.jpg" alt="blog image">
                        </a>
                        <div class="blog-content">
                            <h3 class="box-title"><a href="blog-details.html">Discover the Benefits of Sugar Free Yerba Mate for a Healthier Energy Boost</a></h3>
                            <div class="blog-meta">
                                <a href="blog.html">February 2, 2025</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="blog-card style3">
                        <a href="blog-details.html" class="blog-img">
                            <img src="assets/img/blog/blog_3_2.jpg" alt="blog image">
                        </a>
                        <div class="blog-content">
                            <h3 class="box-title"><a href="blog-details.html">Simple coffee without fancy or expensive equipments</a></h3>
                            <div class="blog-meta">
                                <a href="blog.html">February 5, 2025</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="blog-card style3">
                        <a href="blog-details.html" class="blog-img">
                            <img src="assets/img/blog/blog_3_3.jpg" alt="blog image">
                        </a>
                        <div class="blog-content">
                            <h3 class="box-title"><a href="blog-details.html">Freezing coffee beans will drinks coffee look in 2025</a></h3>
                            <div class="blog-meta">
                                <a href="blog.html">February 7, 2025</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!--==============================
newsletter Area
==============================-->
    <div class="newsletter-area3 overflow-hidden space">
        <div class="shape-mockup jump d-none d-xl-block" data-bottom="3%" data-left="0%"><img src="{{ asset('website/assets/img/shape/shape-16.png') }}" alt="shape"></div>
        <div class="shape-mockup jump d-none d-xl-block" data-top="5%" data-right="0%"><img src="{{ asset('assets/img/shape/shape-15.png') }}" alt="shape"></div>
        <div class="container th-container4">
            <diV class="newsletter-sec bg-title" data-bg-src="{{ asset($homeSettings->getFirstMediaUrl("newsletter_image")) }}">
                <div class="newsletter-content2">
                    <span class="sub-title text-white">{{ $homeSettings->newsletter_title }}</span>
                    <h3 class="sec-title2 text-white fw-medium">
                        {{ $homeSettings->newsletter_description }}
                    </h3>
                    <form class="newsletter-form style2">
                        <div class="form-group">
                            <input class="form-control" type="email" placeholder="your email address" required="">
                            <button type="submit" class="th-btn black-btn"><i class="fa-regular fa-arrow-right-long"></i></button>
                        </div>
                    </form>
                </div>
                <div class="newsletter-image3">
                    <img src="{{ asset('website/assets/img/normal/newsleter2.png') }}" alt="">
                </div>
            </div>
        </div>
    </diV>
    <!--==============================
	Footer Area
==============================-->
    <footer class="footer-wrapper bg-white footer-layout3 footer-layout4">
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
    </footer>

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
