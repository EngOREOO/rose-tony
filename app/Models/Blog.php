<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;

class Blog extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'content',
        'image',
        'author',
        'slug',
        'tags',
        'is_featured',
        'is_active'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'tags' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($blog) {
            if (!$blog->slug) {
                $blog->slug = Str::slug($blog->title);
            }
        });
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile();
    }
}