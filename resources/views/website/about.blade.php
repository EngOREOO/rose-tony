@extends('layouts.app')

@section('content')
<!--==============================
    Breadcumb
============================== -->
<!-- <div class="breadcumb-wrapper" data-bg-src="{{ asset('storage/' . $aboutUs->top_image) }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">About Us</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</div> -->

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
                        @if(!empty($aboutUs->application_benefits))
                            @foreach($aboutUs->application_benefits as $benefit)
                                <li class="text-title">
                                    <i class="fa-regular fa-check" style="color: #ff6b61;"></i>
                                    {{ $benefit['benefit_text'] }}
                                </li>
                            @endforeach
                        @else
                            <li class="text-title">
                                <i class="fa-regular fa-check" style="color: #ff6b61;"></i>
                                Find the ideal location for your franchise.
                            </li>
                            <li class="text-title">
                                <i class="fa-regular fa-check" style="color: #ff6b61;"></i>
                                Everything necessary to be a franchisee.
                            </li>
                            <li class="text-title">
                                <i class="fa-regular fa-check" style="color: #ff6b61;"></i>
                                Send us your application.
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="about-image">
            <img src="{{ asset('storage/' . $aboutUs->under_video_image) }}" alt="">
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
            @if(isset($aboutUs->counters) && is_array($aboutUs->counters))
                @foreach($aboutUs->counters as $counter)
                    <div class="counter-card">
                        <div class="media-body">
                            <h2 class="box-number">
                                <span class="counter-number">{{ $counter['number'] }}</span>{{ $counter['suffix'] }}
                            </h2>
                            <h6 class="box-text">{{ $counter['text'] }}</h6>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="counter-card">
                    <div class="media-body">
                        <h2 class="box-number"><span class="counter-number">2</span>k+</h2>
                        <p class="box-text">Quality Products</p>
                    </div>
                </div>
                <div class="counter-card">
                    <div class="media-body">
                        <h2 class="box-number"><span class="counter-number">3.5</span>k+</h2>
                        <p class="box-text">Happy Customers</p>
                    </div>
                </div>
                <div class="counter-card">
                    <div class="media-body">
                        <h2 class="box-number"><span class="counter-number">245</span>+</h2>
                        <p class="box-text">Total Categories</p>
                    </div>
                </div>
                <div class="counter-card">
                    <div class="media-body">
                        <h2 class="box-number"><span class="counter-number">8</span>k+</h2>
                        <p class="box-text">Store Locations</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!--==============================
About Area  
==============================-->
<div class="overflow-hidden space" dir="rtl">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <!-- النصوص -->
            <div class="col-xl-6 text-xl-end">
                <div class="pe-xl-5">
                    <div class="title-area mb-4">
                        <div class="text-muted fs-5 lh-lg">
                            {!! $aboutUs->why_choose_us !!}
                        </div>
                    </div>
                    <div class="row gy-4">
                        <div class="col-xl-6">
                            <div class="text-muted lh-lg">
                                {!! $aboutUs->our_mission !!}
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="text-muted lh-lg">
                                {!! $aboutUs->our_principles !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- الصور -->
            <div class="col-xl-6">
                <div class="img-box4 ps-xl-5"> <!-- دفع الصور لليسار -->
                    @for ($i = 0; $i < 4; $i++)
                        @if (!empty($aboutUs->side_images[$i]))
                            <div class="img{{ $i + 1 }} mb-3">
                                <img src="{{ asset('storage/' . $aboutUs->side_images[$i]) }}" alt="" class="img-fluid rounded shadow-sm">
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>


<!--==============================
Testimonial Area  
==============================-->
<section class="overflow-hidden position-relative space" id="testi-sec" data-bg-src="{{ asset('assets/img/bg/testi_bg_6.jpg') }}">
    <div class="container th-container5">
        <div class="title-area text-center mb-30">
            <h2 class="sec-title sec-title2 style1">آراء العملاء</h2>
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
                                    <img src="{{ asset('/assets/images/lolo.png') }}" alt="Avatar">
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


@endsection

@push('scripts')
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
@endpush