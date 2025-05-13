@extends('layouts.app')

@section('content')
<!--==============================
    Breadcumb
============================== -->
@php
    $blog = \App\Models\Blog::first();
@endphp
<!-- <div class="breadcumb-wrapper" data-bg-src="{{ $blog->header_image }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">المدونة</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                <li>المدونة</li>
            </ul>
        </div>
    </div>
</div> -->

<!--==============================
Blog Area
==============================-->
<!-- <style>
    .category-list {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .form-check {
        margin-bottom: 10px;
        padding: 0;
    }

    .form-check-input {
        display: none;
    }

    .form-check-label {
        display: block;
        padding: 12px 15px;
        color: #666;
        text-decoration: none;
        border-radius: 8px;
        transition: all 0.3s ease;
        background: #f8f9fa;
        cursor: pointer;
        width: 100%;
    }

    .form-check-input:checked + .form-check-label {
        background: #e62d28;
        color: #fff;
    }

    .form-check-label:hover {
        background: #e62d28;
        color: #fff;
    }

    .widget_title {
        font-size: 20px;
        margin-bottom: 20px;
        color: #333;
        font-weight: 600;
    }

    .widget.radius {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .blog-meta {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 10px;
    }

    .blog-category {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 15px;
        background: #e62d28;
        color: #fff;
        font-size: 14px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .blog-category:hover {
        background: #333;
        color: #fff;
    }

    .blog-date {
        color: #666;
        font-size: 14px;
    }
</style> -->
<section class="th-blog-wrapper space-top space-extra-bottom">
    <div class="container">
        <div class="row gx-40">
            <div class="col-lg-4">
                <aside class="sidebar-area">
                    <div class="widget widget_search">
                        <form class="search-form" action="{{ route('blogs.search') }}" method="GET">
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            <input style="text-align: center;" type="text" name="query" placeholder="بحث..." value="{{ request('query') }}" style="text-align: right;">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>

                    <!-- Categories Widget -->
                    <!-- Categories Widget -->
                                        <div class="widget radius p-24 mb-24">
                                            <h3 class="widget_title">الأقسام</h3>
                                            <form action="{{ route('blogs.index') }}" method="GET">
                                                <div class="category-list">
                                                    @php
                                                        $categories = \App\Models\BlogCategory::withCount('blogs')
                                                            ->where('is_active', true)
                                                            ->orderBy('sort_order')
                                                            ->get();
                                                        $totalBlogs = $categories->sum('blogs_count');
                                                    @endphp
                                                    <div class="form-check">
                                                        <a href="{{ route('blogs.index') }}" class="form-check-label" style="{{ !request('category') ? 'font-weight: bold;' : '' }}">
                                                            <span class="form-check-input" style="pointer-events: none; {{ !request('category') ? 'background-color: #0d6efd; border-color: #0d6efd;' : '' }}"></span>
                                                            الكل ({{ $totalBlogs }})
                                                        </a>
                                                    </div>
                                @foreach($categories as $category)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="category"
                                            id="category{{ $category->id }}" value="{{ $category->slug }}"
                                            {{ request('category') == $category->slug ? 'checked' : '' }}
                                            onchange="this.form.submit()">
                                        <label class="form-check-label" for="category{{ $category->id }}">
                                            {{ $category->name }} ({{ $category->blogs_count }})
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </form>
                    </div>
                </aside>
            </div>

            <div class="col-lg-8">
                <div class="row gx-24">
                    @foreach($blogs as $blog)
                    <div class="col-lg-4">
                        <div class="th-blog blog-single grid has-post-thumbnail">
                            <div class="blog-img img-shine">
                                <a href="{{ route('blogs.show', $blog->slug) }}">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    @if($blog->category)
                                        <a href="{{ route('blogs.index', ['category' => $blog->category->slug]) }}" class="blog-category">
                                            {{ $blog->category->name }}
                                        </a>
                                    @endif
                                    <span class="blog-date">{{ $blog->created_at->format('Y/m/d') }}</span>
                                </div>
                                <h2 class="box-title">
                                    <a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a>
                                </h2>
                                <a href="{{ route('blogs.show', $blog->slug) }}" class="line-btn">قراءة المزيد</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="th-pagination">
                    {{ $blogs->appends(request()->query())->links() }}
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection