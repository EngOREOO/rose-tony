<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterMenuItem extends Model
{
    protected $fillable = [
        'section',
        'title',
        'url',
        'sort_order',
    ];

    public function scopeCustomerService($query)
    {
        return $query->where('section', 'customer_service')->orderBy('sort_order');
    }

    public function scopeOrdersReturn($query)
    {
        return $query->where('section', 'orders_return')->orderBy('sort_order');
    }

    public function scopeBestSellers($query)
    {
        return $query->where('section', 'best_sellers')->orderBy('sort_order');
    }
}