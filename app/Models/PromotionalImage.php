<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromotionalImage extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'button_text',
        'button_link',
        'discount_percentage',
        'promotional_image',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'discount_percentage' => 'integer',
    ];
}