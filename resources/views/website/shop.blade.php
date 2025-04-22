@extends('layouts.app')

@section('title', 'Shop Grid With Right Sidebar - Erna')

@section('content')
<!-- Breadcrumb -->
<div class="breadcumb-wrapper" data-bg-src="{{ asset('website/assets/img/bg/breadcumb-bg.jpg') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Shop Grid With Right Sidebar</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Shop Grid</li>
            </ul>
        </div>
    </div>
</div>

<!-- Shop Area -->
<section class="th-blog-wrapper space-top space-extra-bottom">
    <div class="container th-container3">
        <div class="row gx-40">
            <!-- Products Grid -->
            <div class="col-lg-9">
                <div class="th-sort-bar">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md">
                            <p class="woocommerce-result-count">Showing {{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }} of {{ $products->total() ?? 0 }} products</p>
                        </div>
                        <div class="col-md-auto">
                            <form class="woocommerce-ordering" method="get">
                                <select name="orderby" class="orderby" aria-label="Shop order" onchange="this.form.submit()">
                                    <option value="menu_order" {{ request('orderby') == 'menu_order' ? 'selected' : '' }}>Short By Latest</option>
                                    <option value="popularity" {{ request('orderby') == 'popularity' ? 'selected' : '' }}>Sort by popularity</option>
                                    <option value="rating" {{ request('orderby') == 'rating' ? 'selected' : '' }}>Sort by average rating</option>
                                    <option value="date" {{ request('orderby') == 'date' ? 'selected' : '' }}>Sort by latest</option>
                                    <option value="price" {{ request('orderby') == 'price' ? 'selected' : '' }}>Sort by price: low to high</option>
                                    <option value="price-desc" {{ request('orderby') == 'price-desc' ? 'selected' : '' }}>Sort by price: high to low</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row gy-40">
                    @forelse($products as $product)
                    <div class="col-lg-4 col-sm-6">
                        <div class="product-grid style1">
                            <div class="box-img">
                            @php
                               $fixedPath = str_replace('storage/app/public/', 'storage/', $product->getFirstMediaUrl('product_images'));
                            @endphp
                                <img src="{{ $fixedPath }}" alt="{{ $product->name }}">

                                @if($product->discounted_price)
                                <span class="product-tag">On Sale</span>
                                @endif
                            </div>
                            <div class="product-grid-content">
                                <div class="woocommerce-product-rating">
                                    <div class="star-rating" role="img" aria-label="Rated {{ $product->rating ?? 5 }} out of 5">
                                        <span>Rated <strong class="rating">{{ $product->rating ?? 5 }}</strong> out of 5</span>
                                    </div>
                                    <span class="count">({{ $product->reviews_count ?? 0 }} reviews)</span>
                                </div>
                                <h3 class="box-title">
                                @if($product->slug)
                                    <a href="{{ route('shop.product', ['product' => $product->slug]) }}">{{ $product->name }}</a>
                                @else
                                    {{ $product->name }}
                                @endif
                                </h3>
                                <span class="box-price">
                                    @if($product->discounted_price)
                                    <del>{{ number_format($product->price, 2) }} ج.م</del>
                                    {{ number_format($product->discounted_price, 2) }} ج.م
                                    @else
                                    {{ number_format($product->price, 2) }} ج.م
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-info">No products found</div>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="th-pagination text-center pt-50">
                    {{ $products->appends(request()->query())->links() }}
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-3">
                <aside class="sidebar-area">
                    <!-- Search Widget -->
                    <div class="widget widget_search radius style3">
                        <form class="search-form" action="{{ route('shop.index') }}" method="GET">
                            <input type="text" name="search" placeholder="Enter Keyword" value="{{ request('search') }}">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>

                    <!-- Size Widget -->
                    

                    <!-- Categories Widget -->
                    <div class="widget radius p-24 mb-24">
                        <h3 class="widget_title">الأقسام</h3>
                        <form action="{{ route('shop.index') }}" method="GET">
                            <div class="category-list">
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
                    <div class="widget widget_offer space" data-bg-src="{{ asset('website/assets/img/bg/widget_bg_1.jpg') }}">
                        <div class="offer-banner">
                            <h4 class="box-title">#Black Friday</h4>
                            <h5 class="banner-title">SALE</h5>
                            <div class="offer">
                                <p class="offer"><span class="text-theme">50%</span></p>
                                <h6 class="box-title text-white mb-n2">Modern Dress</h6>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
@endsection