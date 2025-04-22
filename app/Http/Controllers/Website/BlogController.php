<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('is_active', true)
                    ->latest()
                    ->paginate(6);
        
        $featuredBlogs = Blog::where('is_active', true)
                            ->where('is_featured', true)
                            ->latest()
                            ->take(5)
                            ->get();
        
        return view('website.blogs', compact('blogs', 'featuredBlogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
                    ->where('is_active', true)
                    ->firstOrFail();
        
        $relatedBlogs = Blog::where('id', '!=', $blog->id)
                            ->where('is_active', true)
                            ->latest()
                            ->take(3)
                            ->get();
        
        $recentPosts = Blog::where('is_active', true)
                          ->where('id', '!=', $blog->id)
                          ->latest()
                          ->take(3)
                          ->get();
        
        return view('website.blog-details', compact('blog', 'relatedBlogs', 'recentPosts'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        
        $blogs = Blog::where('is_active', true)
                    ->where(function($q) use ($query) {
                        $q->where('title', 'like', "%{$query}%")
                          ->orWhere('content', 'like', "%{$query}%");
                    })
                    ->latest()
                    ->paginate(6);
        
        return view('website.blogs', compact('blogs', 'query'));
    }
}