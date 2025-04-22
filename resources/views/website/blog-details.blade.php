@extends('layouts.app')

@section('content')
<!--==============================
    Breadcumb
============================== -->
<div class="breadcumb-wrapper" data-bg-src="{{ asset('website/images/bg/breadcumb-bg.jpg') }}">
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
</div>

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
                        <div class="blog-content">
                            {!! $blog->content !!}
                        </div>

                        <div class="share-links clearfix">
                            <div class="row justify-content-between">
                                <div class="col-sm-auto">
                                    <span class="share-links-title">Tags:</span>
                                    <div class="tagcloud">
                                        @foreach(explode(',', $blog->tags) as $tag)
                                            <a href="{{ route('blogs.search', ['query' => trim($tag)]) }}">{{ trim($tag) }}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-sm-auto text-xl-end">
                                    <span class="share-links-title">Share On:</span>
                                    <div class="th-social">
                                        <a href="https://facebook.com/share?url={{ url()->current() }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="https://twitter.com/share?url={{ url()->current() }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="https://www.linkedin.com/shareArticle?url={{ url()->current() }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Blog Navigation -->
                        @if($relatedBlogs->count() > 0)
                        <div class="blog-navigation">
                            @if($relatedBlogs->first())
                            <a href="{{ route('blogs.show', $relatedBlogs->first()->slug) }}" class="nav-btn prev">
                                <span class="nav-text"><i class="fa-regular fa-arrow-left-long me-2"></i>Previous</span>
                            </a>
                            @endif
                            @if($relatedBlogs->last())
                            <a href="{{ route('blogs.show', $relatedBlogs->last()->slug) }}" class="nav-btn next">
                                <span class="nav-text">Next<i class="fa-regular fa-arrow-right-long ms-2"></i></span>
                            </a>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Related Posts -->
                @if($relatedBlogs->count() > 0)
                <div class="related-posts mt-5">
                    <h3 class="blog-inner-title h4">Related Posts</h3>
                    <div class="row">
                        @foreach($relatedBlogs as $relatedBlog)
                        <div class="col-md-6">
                            <div class="th-blog blog-single grid">
                                <div class="blog-img img-shine">
                                    <a href="{{ route('blogs.show', $relatedBlog->slug) }}">
                                        <img src="{{ asset('storage/' . $relatedBlog->image) }}" alt="{{ $relatedBlog->title }}">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <a href="#">By {{ $relatedBlog->author }}</a>
                                        <a href="#">{{ $relatedBlog->created_at->format('d M, Y') }}</a>
                                    </div>
                                    <h4 class="box-title">
                                        <a href="{{ route('blogs.show', $relatedBlog->slug) }}">{{ $relatedBlog->title }}</a>
                                    </h4>
                                    <a href="{{ route('blogs.show', $relatedBlog->slug) }}" class="line-btn">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <div class="col-lg-4">
                <aside class="sidebar-area">
                    <div class="widget widget_search">
                        <form class="search-form" action="{{ route('blogs.search') }}" method="GET">
                            <input type="text" name="query" placeholder="Search blogs..." value="{{ request('query') }}">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>

                    @if(isset($recentPosts))
                    <div class="widget">
                        <h3 class="widget_title">Recent Posts</h3>
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
                        <h3 class="widget_title">Popular Tags</h3>
                        <div class="tagcloud">
                            @php
                                $allTags = \App\Models\Blog::pluck('tags')->flatMap(function($tags) {
                                    return explode(',', $tags);
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