@extends('layouts.app')

@section('content')
<!--==============================
    Breadcumb
============================== -->
<div class="breadcumb-wrapper" data-bg-src="{{ asset('storage/' . $aboutUs->top_image) }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">About Us</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</div>

<!--==============================
About Area  
==============================-->
<div class="overflow-hidden space-top" data-bg-src="{{ asset('assets/img/bg/pattern_bg_5.png') }}" id="about-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 text-xl-start">
                <div class="title-area mb-37">
                    <h2 class="sec-title style1">{{ $aboutUs->head_text }}</h2>
                    {!! $aboutUs->paragraph !!}
                </div>
                <br>
                <br>
            </div>
            <div class="col-xl-6">
                <div class="checklist mb-45 ps-xl-5">
                    <ul>
                        <li class="text-title"><i class="fa-regular fa-check"></i>Find the ideal location for your franchise.</li>
                        <li class="text-title"><i class="fa-regular fa-check"></i>Everything necessary to be a franchisee.</li>
                        <li class="text-title"><i class="fa-regular fa-check"></i>Send us your application.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="about-image">
            <img src="{{ asset('storage/' . $aboutUs->under_video_image) }}" alt="">
                <div class="discount-wrapp style2">
                    <a href="{{ $aboutUs->video_url }}" class="play-btn popup-video">
                        <i class="fa-thin fa-play"></i></a>
                    <div class="discount-tag">
                        <span class="discount-anime">watch video. watch video.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==============================
Counter Area  
==============================-->
<div class="pt-60">
    <div class="container">
        <div class="counter-card-wrap">
            <div class="counter-card">
                <div class="media-body">
                    <h2 class="box-number"><span class="counter-number">1</span>k+</h2>
                    <p class="box-text">Quality full Products</p>
                </div>
            </div>
            <div class="counter-card">
                <div class="media-body">
                    <h2 class="box-number"><span class="counter-number">2</span>k+</h2>
                    <p class="box-text">Satisfied Customer</p>
                </div>
            </div>
            <div class="counter-card">
                <div class="media-body">
                    <h2 class="box-number"><span class="counter-number">223</span>+</h2>
                    <p class="box-text">Product Categories</p>
                </div>
            </div>
            <div class="counter-card">
                <div class="media-body">
                    <h2 class="box-number"><span class="counter-number">5</span>k+</h2>
                    <p class="box-text">Product Collections</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==============================
About Area  
==============================-->
<div class="overflow-hidden bg-white space">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-xl-6">
                <div class="img-box4">
                @for ($i = 0; $i < 4; $i++)
                @if (!empty($aboutUs->side_images[$i]))
                    <div class="img{{ $i + 1 }}">
                        <img src="{{ asset('storage/' . $aboutUs->side_images[$i]) }}" alt="">
                    </div>
                @endif
                @endfor
                </div>
            </div>
            <div class="col-xl-6 text-xl-start">
                <div class="ps-xl-5">
                    <div class="title-area mb-37">
                        {!! $aboutUs->why_choose_us !!}
                    </div>
                    <div class="row gy-4 justify-content-center">
                        <div class="col-xl-6">
                            {!! $aboutUs->our_mission !!}
                        </div>
                        <div class="col-xl-6">
                            {!! $aboutUs->our_principles !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==============================
Testimonial Area  
==============================-->
<section class="overflow-hidden position-relative bg-white space" id="testi-sec" data-bg-src="{{ asset('assets/img/bg/testi_bg_6.jpg') }}">
    <div class="container th-container5">
        <div class="title-area text-center mb-30">
            <h2 class="sec-title sec-title2 style1">Customers Latest Reviews</h2>
        </div>
    </div>
    <div class="container th-container5">
        <div class="slider-wrap">
            <div class="swiper th-slider has-shadow testiSlider5" id="testiSlider5" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"767":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"2"},"1400":{"slidesPerView":"3"}}}'>
                <div class="swiper-wrapper">
                    @php
                        $customer_reviews = \Illuminate\Support\Facades\DB::table('customer_reviews')
                            ->orderBy('created_at', 'desc')
                            ->take(10)
                            ->get();
                    @endphp

                    @foreach($customer_reviews as $review)
                    <div class="swiper-slide">
                        <div class="testi-box style2">
                            <div class="testi-wrapp">
                                <div class="box-quote">
                                    <img src="{{ asset('assets/img/icon/quote2.svg') }}" alt="">
                                </div>
                                <div class="box-review">
                                    @for($i = 0; $i < $review->rate; $i++)
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                            <p class="box-text">{{ $review->rating_text }}</p>
                            <div class="box-profile">
                                <div class="box-avater">
                                    <img src="{{ asset('assets/img/avatar/user.png') }}" alt="Avatar">
                                </div>
                                <div class="media-body">
                                    <h3 class="box-title">{{ $review->name }}</h3>
                                    <p class="box-desig">Customer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="slider-pagination"></div>
            </div>
        </div>
    </div>
</section>

<!--==============================
Brand Area  
==============================-->
@php
$aboutUs = \App\Models\AboutUs::first();
$brands = $aboutUs->partners_logos ?? [];
@endphp
@if (!empty($brands) && is_array($brands))
    <div class="space">
        <div class="title-area text-center">
            <h2 class="sec-title sec-title2">Popular Brands</h2>
        </div>
        <div class="container th-container">
            <div class="swiper th-slider" id="brandSlider2">
                <div class="swiper-wrapper">
                    @foreach($brands as $brand)
                        @if (!empty($brand['logo']))
                            <div class="swiper-slide">
                                <div class="brand-img">
                                    <a href="{{ route('shop.index') }}">
                                        <img src="{{ asset('storage/' . $brand['logo']) }}" alt="Partner Logo">
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif


@endsection

@push('scripts')
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
@endpush