
@extends('layouts.app')

@section('og_locale'){{ $blog->og_locale ?? 'ar_AR' }}@endsection
@section('og_type'){{ $blog->og_type ?? 'article' }}@endsection
@section('og_title'){{ $blog->meta_title ?? $blog->title }}@endsection
@section('og_description'){{ $blog->meta_description ?? Str::limit(strip_tags($blog->content), 160) }}@endsection
@section('og_image'){{ asset('storage/' . $blog->image) }}@endsection
@section('og_url'){{ url()->current() }}@endsection
@section('og_site_name'){{ config('app.name') }}@endsection
@section('title'){{ $blog->meta_title ?? $blog->title }}@endsection

@section('meta_description'){{ $blog->meta_description ?? Str::limit(strip_tags($blog->content), 160) }}@endsection

@section('meta_keywords'){{ is_array($blog->meta_keywords) ? implode(', ', $blog->meta_keywords) : $blog->meta_keywords }}@endsection

@section('focus_keywords'){{ is_array($blog->meta_keywords) ? implode(', ', $blog->meta_keywords) : $blog->meta_keywords }}@endsection
@section('twitter_card')'summary_large_image'@endsection
@section('twitter_title'){{ $blog->meta_title ?? $blog->title }}@endsection
@section('twitter_description'){{ $blog->meta_description ?? Str::limit(strip_tags($blog->content), 160) }}@endsection
@section('twitter_image'){{ asset('storage/' . $blog->image) }}@endsection
@section('twitter_url'){{ url()->current() }}@endsection

@section('content')
<!--==============================
    Breadcumb
============================== -->
<!-- <div class="breadcumb-wrapper" data-bg-src="{{ asset('website/images/bg/breadcumb-bg.jpg') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">{{ $blog->title }}</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('blogs.index') }}">Blog</a></li>
                <li>Blog Details</li>
            </ul>
        </div>
    </div>
</div> -->

<!--==============================
Blog Area
==============================-->
<section class="th-blog-wrapper space-top space-extra-bottom">
    <div class="container">
        <div class="row gx-40">
            <div class="col-lg-8">
                <div class="th-blog blog-single has-post-thumbnail">
                    <div class="blog-img img-shine">
                        @if($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                        @endif
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="#">By {{ $blog->author }}</a>
                            <a href="#">{{ $blog->created_at->format('d M, Y') }}</a>
                        </div>
                        <h2 class="box-title">{{ $blog->title }}</h2>
                        
                        {!! $blog->content !!}

                        @if($blog->quote_text)
                        <blockquote>
                            <p>{{ $blog->quote_text }}</p>
                            <cite>{{ $blog->quote_author }}</cite>
                        </blockquote>
                        @endif

                        @if(!empty($blog->gallery_images))
                        <div class="row">
                            @foreach($blog->gallery_images as $image)
                            <div class="col-md-4">
                                <div class="blog-img img-shine">
                                    <img class="w-100" src="{{ asset('storage/' . $image) }}" alt="Blog Image">
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif

                        <div class="share-links clearfix">
                            <div class="row justify-content-between">
                                <div class="col-sm-auto">
                                    <!-- <span class="share-links-title">الوسوم:</span> -->
                                    <div class="tagcloud">
                                   @php
                                        $allTags = \App\Models\Blog::pluck('tags')->flatMap(function($tags) {
                                            // Check if $tags is a string, then use explode(), otherwise return the array directly
                                            return is_string($tags) ? explode(',', $tags) : $tags;
                                        })->unique();
                                    @endphp

                                    <!-- @foreach($allTags as $tag)
                                        <a href="{{ route('blogs.search', ['query' => trim($tag)]) }}">{{ trim($tag) }}</a>
                                    @endforeach -->


                                    </div>
                                </div>
                                <div class="col-sm-auto text-xl-end">
                                    <span class="share-links-title">مشاركة علي:</span>
                                    <div class="th-social">
                                        <a href="https://facebook.com/share?url={{ url()->current() }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="https://twitter.com/share?url={{ url()->current() }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="https://www.linkedin.com/shareArticle?url={{ url()->current() }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="blog-navigation">
                            @if($blog->getPreviousBlog())
                            <a href="{{ route('blogs.show', $blog->getPreviousBlog()->slug) }}" class="nav-btn prev">
                                <span class="nav-text"><i class="fa-regular fa-arrow-left-long me-2"></i>السابق</span>
                            </a>
                            @endif
                            @if($blog->getNextBlog())
                            <a href="{{ route('blogs.show', $blog->getNextBlog()->slug) }}" class="nav-btn next">
                                <span class="nav-text">التالي<i class="fa-regular fa-arrow-right-long ms-2"></i></span>
                            </a>
                            @endif
                        </div>

                        <!-- Related Posts -->
                        <div class="related-posts-area">
                            <h2 class="blog-inner-title h4">مقالات متعلقة</h2>
                            <div class="row">
                                <div class="col-12">
                                    <div class="swiper related-blog-slider" dir="rtl">
                                        <div class="swiper-wrapper">
                                            @foreach(\App\Models\Blog::where('category_id', $blog->category_id)
                                                    ->where('id', '!=', $blog->id)
                                                    ->where('is_active', true)
                                                    ->latest()
                                                    ->take(6)
                                                    ->get() as $relatedBlog)
                                            <div class="swiper-slide">
                                                <div class="th-blog blog-single">
                                                    <div class="blog-img">
                                                        <a href="{{ route('blogs.show', $relatedBlog->slug) }}">
                                                            <img src="{{ asset('storage/' . $relatedBlog->image) }}" alt="{{ $relatedBlog->title }}">
                                                        </a>
                                                    </div>
                                                    <div class="blog-content">
                                                        <div class="blog-meta">
                                                            <a href="#">{{ $relatedBlog->created_at->format('d M, Y') }}</a>
                                                        </div>
                                                        <h3 class="box-title">
                                                            <a href="{{ route('blogs.show', $relatedBlog->slug) }}">
                                                                {{ Str::limit($relatedBlog->title, 60) }}
                                                            </a>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- <div class="th-comment-form">
                    <div class="form-title">
                        <h3 class="blog-inner-title h4 mb-2">Leave a Reply</h3>
                        <p class="form-text">Your email address will not be published. Required fields are marked *</p>
                    </div>
                    <form action="{{ route('blogs.comment', $blog->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="parent_id" id="parent_id">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" placeholder="Your Name*" class="form-control" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" name="email" placeholder="Email Address*" class="form-control" required>
                            </div>
                            <div class="col-12 form-group">
                                <textarea name="comment" placeholder="Type Your Message" class="form-control" required></textarea>
                            </div>
                            <div class="col-12 form-group mb-0">
                                <button class="th-btn btn-fw text-uppercase">Submit Comment</button>
                            </div>
                        </div>
                    </form>
                </div> -->
            </div>

            <div class="col-lg-4">
                <aside class="sidebar-area">
                    <div class="widget widget_search">
                        <form class="search-form" action="{{ route('blogs.search') }}" method="GET">
                            <input style="text-align: center;" type="text" name="query" placeholder="بحث..." value="{{ request('query') }}">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>

                    <div class="widget widget_categories">
                        <h3 class="widget_title">الأقسام</h3>
                        <ul>
                            @foreach(\App\Models\BlogCategory::withCount('blogs')->get() as $category)
                                <li>
                                    <a href="{{ route('blogs.index', ['category' => $category->slug]) }}">
                                        {{ $category->name }} ({{ $category->blogs_count }})
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    @if(isset($recentPosts))
                    <div class="widget">
                        <h3 class="widget_title">أحدث المقالات</h3>
                        <div class="recent-post-wrap">
                            @foreach($recentPosts as $recentPost)
                            <div class="recent-post">
                                <div class="media-img">
                                    <a href="{{ route('blogs.show', $recentPost->slug) }}">
                                        <img src="{{ asset('storage/' . $recentPost->image) }}" alt="{{ $recentPost->title }}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="post-title">
                                        <a class="text-inherit" href="{{ route('blogs.show', $recentPost->slug) }}">
                                            {{ Str::limit($recentPost->title, 50) }}
                                        </a>
                                    </h4>
                                    <div class="recent-post-meta">
                                        <a href="#">{{ $recentPost->created_at->format('d M, Y') }}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="widget widget_tag_cloud">
                        <h3 class="widget_title">الوسوم</h3>
                        <div class="tagcloud">
                           @php
                                $allTags = \App\Models\Blog::pluck('tags')->flatMap(function($tags) {
                                    // Check if $tags is a string, then use explode(), otherwise return the array directly
                                    if (is_string($tags)) {
                                        return explode(',', $tags);
                                    }
                                    // If $tags is already an array, return it directly
                                    return $tags;
                                })->unique();
                            @endphp

                            @foreach($allTags as $tag)
                                <a href="{{ route('blogs.search', ['query' => trim($tag)]) }}">{{ trim($tag) }}</a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
@endsection
