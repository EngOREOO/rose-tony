@extends('layouts.app')

@section('title', 'Shop Grid With Right Sidebar - Erna')

@section('content')
<!-- Breadcrumb -->
<!-- <div class="breadcumb-wrapper" data-bg-src="{{ asset('website/assets/img/bg/breadcumb-bg.jpg') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">المنتجات</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                <li>المنتجات</li>
            </ul>
        </div>
    </div>
</div> -->

<!-- Shop Area -->
<section class="th-blog-wrapper space-top space-extra-bottom">
    <div class="container th-container3">
        <div class="row gx-40">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <aside class="sidebar-area">
                    <!-- Search Widget -->
                    <div class="widget widget_search radius style3">
                        <form class="search-form" action="{{ route('shop.index') }}" method="GET">
                            <input style="text-align: center;" type="text" name="search" placeholder="ابحث هنا..." value="{{ request('search') }}" style="text-align: right;">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>

                    <!-- Categories Widget -->
                    <div class="widget radius p-24 mb-24">
                        <h3 class="widget_title">الأقسام</h3>
                        <form action="{{ route('shop.index') }}" method="GET">
                            <div class="category-list">
                                @php
                                    $categories = \App\Models\HomeCategory::withCount('products')->get();
                                @endphp
                                @foreach($categories as $category)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="category" 
                                            id="category{{ $category->id }}" value="{{ $category->id }}"
                                            {{ request('category') == $category->id ? 'checked' : '' }}
                                            onchange="this.form.submit()">
                                        <label class="form-check-label" for="category{{ $category->id }}">
                                            {{ $category->name }} ({{ $category->products_count }})
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </form>
                    </div>

                    <!-- Offer Widget -->
                    @if($promotionalImage)
                                       <div class="widget widget_offer space w-100" data-bg-src="{{ asset('storage/' . $promotionalImage->promotional_image) }}" style="background-size: cover; background-position: center; width: 876px; height: 682px; margin: 0 auto;">
                                           <div class="offer-banner" style="height: 100%;">
                            @if($promotionalImage->title)
                                <h4 class="box-title">{{ $promotionalImage->title }}</h4>
                            @endif
                            @if($promotionalImage->subtitle)
                                <h5 class="banner-title">{{ $promotionalImage->subtitle }}</h5>
                            @endif
                            @if($promotionalImage->discount_percentage)
                                <div class="offer">
                                    <p class="offer"><span class="text-theme">{{ $promotionalImage->discount_percentage }}%</span></p>
                                </div>
                            @endif
                            @if($promotionalImage->button_text)
                                <a href="{{ $promotionalImage->button_link }}" class="th-btn btn-sm">{{ $promotionalImage->button_text }}</a>
                            @endif
                        </div>
                    </div>
                    @endif
                </aside>
            </div>

            <!-- Products Grid -->
            <div class="col-lg-9">
                <div class="th-sort-bar">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md">
                            <p class="woocommerce-result-count">عرض {{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }} من {{ $products->total() ?? 0 }} منتج</p>
                        </div>
                        <div class="col-md-auto">
                            <form class="woocommerce-ordering" method="get">
                                <select name="orderby" class="orderby" aria-label="Shop order" onchange="this.form.submit()">
                                    <option value="menu_order" {{ request('orderby') == 'menu_order' ? 'selected' : '' }}>ترتيب حسب الأحدث</option>
                                    <option value="popularity" {{ request('orderby') == 'popularity' ? 'selected' : '' }}>ترتيب حسب الشعبية</option>
                                    <option value="rating" {{ request('orderby') == 'rating' ? 'selected' : '' }}>ترتيب حسب التقييم</option>
                                    <option value="date" {{ request('orderby') == 'date' ? 'selected' : '' }}>ترتيب حسب تاريخ الإضافة</option>
                                    <option value="price" {{ request('orderby') == 'price' ? 'selected' : '' }}>ترتيب حسب السعر: من الأقل للأعلى</option>
                                    <option value="price-desc" {{ request('orderby') == 'price-desc' ? 'selected' : '' }}>ترتيب حسب السعر: من الأعلى للأقل</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row gy-40">
                    @forelse($products as $product)
                    <div class="col-lg-4 col-sm-6">
                        @if($product->slug)
                        <a href="{{ route('shop.product', ['product' => $product->slug]) }}" class="text-decoration-none">
                        @endif
                        <div class="product-grid style1">
                            <div class="box-img">
                            @php
                               $fixedPath = str_replace('storage/app/public/', 'storage/', $product->getFirstMediaUrl('product_images'));
                            @endphp
                                <img src="{{ $fixedPath }}" alt="{{ $product->name }}">

                                @if($product->discounted_price)
                                <span class="product-tag">خصم</span>
                                @endif
                            </div>
                            <div class="product-grid-content">
                                <div class="woocommerce-product-rating">
                                    <div class="star-rating" role="img" aria-label="Rated {{ $product->rating ?? 5 }} out of 5">
                                        <span>Rated <strong class="rating">{{ $product->rating ?? 5 }}</strong> out of 5</span>
                                    </div>
                                    <span class="count">({{ $product->reviews_count ?? 0 }} تقييم)</span>
                                </div>
                                <h3 class="box-title">{{ $product->name }}</h3>
                                <span class="box-price">
                                    @if($product->discounted_price)
                                    <del>{{ number_format($product->price, 2) }} ج.م</del>
                                    {{ number_format($product->discounted_price, 2) }} ج.م
                                    @else
                                    {{ number_format($product->price, 2) }} ج.م
                                    @endif
                                </span>
                            </div>
                            @if($product->slug)
                            </a>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-info">لا توجد منتجات</div>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="th-pagination text-center pt-50">
                    {{ $products->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection