<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'price',
        'description',
        'quantity',
        'in_stock',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'in_stock' => 'boolean',
        'quantity' => 'integer',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('product_images')
            ->useFallbackUrl('/images/placeholder.jpg');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
