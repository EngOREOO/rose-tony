@extends('layouts.app')

@section('content')
<!--==============================
    Breadcumb
============================== -->
@php
    $blog = \App\Models\Blog::first();
@endphp
<div class="breadcumb-wrapper" data-bg-src="{{ $blog->header_image }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Our Blog</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Blog</li>
            </ul>
        </div>
    </div>
</div>

<!--==============================
Blog Area
==============================-->
<section class="th-blog-wrapper space-top space-extra-bottom">
    <div class="container">
        <div class="row gx-40">
            <div class="col-lg-8">
                <div class="row gx-24">
                    @foreach($blogs as $blog)
                    <div class="col-lg-6">
                        <div class="th-blog blog-single grid has-post-thumbnail">
                            <div class="blog-img img-shine">
                                <a href="{{ route('blogs.show', $blog->slug) }}">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a href="#">By {{ $blog->author }}</a>
                                    <a href="#">{{ $blog->created_at->format('d M, Y') }}</a>
                                </div>
                                <h2 class="box-title">
                                    <a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a>
                                </h2>
                                <a href="{{ route('blogs.show', $blog->slug) }}" class="line-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="th-pagination">
                    {{ $blogs->links() }}
                </div>
            </div>
            
            <div class="col-lg-4">
                <aside class="sidebar-area">
                    <div class="widget widget_search">
                        <form class="search-form" action="{{ route('blogs.search') }}" method="GET">
                            <input type="text" name="query" placeholder="Search blogs..." value="{{ request('query') }}">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>

                    @if(isset($featuredBlogs) && $featuredBlogs->count() > 0)
                    <div class="widget">
                        <h3 class="widget_title">Featured Posts</h3>
                        <div class="recent-post-wrap">
                            @foreach($featuredBlogs as $featuredBlog)
                            <div class="recent-post">
                                <div class="media-img">
                                    <a href="{{ route('blogs.show', $featuredBlog->slug) }}">
                                        <img src="{{ asset('storage/' . $featuredBlog->image) }}" alt="{{ $featuredBlog->title }}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="post-title">
                                        <a class="text-inherit" href="{{ route('blogs.show', $featuredBlog->slug) }}">
                                            {{ Str::limit($featuredBlog->title, 50) }}
                                        </a>
                                    </h4>
                                    <div class="recent-post-meta">
                                        <a href="#">{{ $featuredBlog->created_at->format('d M, Y') }}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="widget widget_tag_cloud">
                        <h3 class="widget_title">Popular Tags</h3>
                        <div class="tagcloud">
                            @php
                                $allTags = \App\Models\Blog::pluck('tags')->flatMap(function($tags) {
                                    return explode(',', $tags);
                                })->unique();
                            @endphp
                            @foreach($allTags as $tag)
                                <a href="{{ route('blogs.search', ['query' => $tag]) }}">{{ trim($tag) }}</a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
@endsection