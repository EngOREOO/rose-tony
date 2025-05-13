<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::query()->where('is_active', true);

        // Category filter
        if ($request->has('category')) {
            $category = BlogCategory::where('slug', $request->category)->firstOrFail();
            $query->where('blog_category_id', $category->id);
        }

        // Search filter
        if ($request->filled('query')) {
            $searchTerm = $request->query;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                  ->orWhere('content', 'like', "%{$searchTerm}%");
            });
        }

        $blogs = $query->latest()->paginate(10);

        return view('website.blogs', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
                    ->where('is_active', true)
                    ->firstOrFail();

        return view('website.blog-details', compact('blog'));
    }

    public function search(Request $request)
    {
        return $this->index($request);
    }
}