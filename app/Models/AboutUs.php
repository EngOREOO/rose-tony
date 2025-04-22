<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = 'about_us';

    protected $fillable = [
        'head_text',
        'paragraph',
        'video_url',
        'under_video_image',
        'why_choose_us',
        'side_images',
        'our_mission',
        'our_principles',
        'partners_logos',
        'top_image'
    ];
    protected $casts = [
        'side_images' => 'array',
        'partners_logos' => 'array'
    ];
}
