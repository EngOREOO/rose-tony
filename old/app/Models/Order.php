<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'product_id',
        'email',
        'first_name',
        'last_name',
        'country',
        'street_address',
        'apartment',
        'city',
        'region',
        'postal_code',
        'phone',
        'color',
        'notes',
        'payment_method',
        'status',
        'total',
    ];

    protected $casts = [
        'total' => 'decimal:2',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
