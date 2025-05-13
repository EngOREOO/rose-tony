<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Coupon extends Model
{
    protected $fillable = [
        'code',
        'type', // 'gift', 'percentage', 'fixed', 'both'
        'gift_product_id',
        'percentage_discount',
        'fixed_discount',
        'minimum_amount',
        'starts_at',
        'expires_at',
        'is_active',
        'usage_limit',
        'used_count'
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
        'is_active' => 'boolean',
        'percentage_discount' => 'float',
        'fixed_discount' => 'decimal:2',
        'minimum_amount' => 'decimal:2',
        'usage_limit' => 'integer',
        'used_count' => 'integer'
    ];

    public function giftProduct(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'gift_product_id');
    }

    public function isValid(): bool
    {
        return $this->is_active &&
            (!$this->starts_at || $this->starts_at <= now()) &&
            (!$this->expires_at || $this->expires_at >= now()) &&
            (!$this->usage_limit || $this->used_count < $this->usage_limit);
    }
}