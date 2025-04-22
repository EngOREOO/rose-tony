<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Testimonial extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'type',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('testimonial_images')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp']);

        $this->addMediaCollection('testimonial_videos')
            ->acceptsMimeTypes(['video/mp4', 'video/webm', 'video/ogg']);
    }
}
