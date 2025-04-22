<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ContactUs extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'contact_us';

    protected $fillable = [
        'address',
        'phone',
        'email',
        'map_url',
        'contact_head',
        'contact_paragraph',
        'contact_button_text',
        'image'
    ];
}
