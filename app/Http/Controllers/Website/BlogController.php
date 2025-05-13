<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
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
            $query->where('category_id', $category->id);
        }

        // Search filter
        if ($request->filled('query')) {
            $searchTerm = $request->query('query');
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                  ->orWhere('content', 'like', "%{$searchTerm}%");
            });
        }

        $blogs = $query->latest()->paginate(10);
        
        // Get categories for sidebar
        $categories = BlogCategory::withCount('blogs')->get();
        
        // Get first blog for header image
        $firstBlog = Blog::first();

        return view('website.blogs', compact('blogs', 'firstBlog', 'categories'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
                    ->where('is_active', true)
                    // ->with(['category', 'comments.replies'])
                    ->firstOrFail();
        
        $recentPosts = Blog::where('id', '!=', $blog->id)
                    ->where('is_active', true)
                    ->latest()
                    ->take(3)
                    ->get();

        return view('website.blog-details', compact('blog', 'recentPosts'));
    }

    public function storeComment(Request $request, $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string',
            'parent_id' => 'nullable|exists:blog_comments,id'
        ]);

        $blog->comments()->create($validated);

        return back()->with('success', 'Comment added successfully!');
    }

    public function search(Request $request)
    {
        return $this->index($request);
    }
}