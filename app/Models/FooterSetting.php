<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class FooterSetting extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'about_text',
        'working_hours_weekday',
        'working_hours_weekend',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'linkedin_url',
        'phone',
        'email',
        'address',
        'app_store_url',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')
            ->singleFile();

        $this->addMediaCollection('app_store_image')
            ->singleFile();
            
        $this->addMediaCollection('payment_cards')
            ->singleFile();
    }
}