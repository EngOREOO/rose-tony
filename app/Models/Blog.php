<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'author',
        'tags',
        'category_id',
        'gallery_images',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'quote_text',
        'quote_author',
        'robots',
        'og_locale',
        'og_type',
        'og_url',
        'og_site_name',
        'twitter_card',
        'is_active'
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'is_active' => 'boolean',
        'tags' => 'array',
        'meta_keywords' => 'array',
        'is_featured' => 'boolean',
    ];

    // These attributes should always have a value
    protected $attributes = [
        'robots' => 'index, follow',
        'og_locale' => 'ar_AR',
        'og_type' => 'article',
        'twitter_card' => 'summary_large_image'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::saving(function ($blog) {
            if (!$blog->slug) {
                $blog->slug = Str::slug($blog->title);
            }
            
            // Always ensure meta fields are set (both for create and update)
            if (empty($blog->meta_title)) {
                $blog->meta_title = $blog->title;
            }
            
            if (empty($blog->meta_description)) {
                $blog->meta_description = Str::limit(strip_tags($blog->content), 160);
            }
            
            if (empty($blog->meta_keywords)) {
                $blog->meta_keywords = $blog->tags;
            }
            
            // Always ensure OpenGraph and other meta fields have default values
            $blog->robots = $blog->robots ?: 'index, follow';
            $blog->og_locale = $blog->og_locale ?: 'ar_AR';
            $blog->og_type = $blog->og_type ?: 'article';
            $blog->og_url = url()->current();
            $blog->og_site_name = config('app.name');
            $blog->twitter_card = 'summary_large_image';
        });

        static::saved(function ($blog) {
            if ($blog->category) {
                $blog->category->updatePostsCount();
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function getMetaTitleAttribute($value)
    {
        return $value ?? $this->title;
    }

    public function getMetaDescriptionAttribute($value)
    {
        return $value ?? Str::limit(strip_tags($this->content), 160);
    }

    public function getMetaKeywordsAttribute($value)
    {
        if (empty($value)) {
            return $this->tags ?? [];
        }
        return is_array($value) ? $value : json_decode($value, true) ?? [];
    }

    public function getRobotsAttribute($value)
    {
        return $value ?? 'index, follow';
    }

    public function getOgLocaleAttribute($value)
    {
        return $value ?? 'ar_AR';
    }

    public function getOgTypeAttribute($value)
    {
        return $value ?? 'article';
    }

    public function getPreviousBlog()
    {
        return self::where('is_active', true)
            ->where('created_at', '<', $this->created_at)
            ->orderBy('created_at', 'desc')
            ->first();
    }

    public function getNextBlog()
    {
        return self::where('is_active', true)
            ->where('created_at', '>', $this->created_at)
            ->orderBy('created_at', 'asc')
            ->first();
    }
}