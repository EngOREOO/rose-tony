<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductReview extends Model
{
    protected $fillable = [
        'product_id',
        'name',
        'comment',
        'rating',
        'status'
    ];

    protected $attributes = [
        'status' => 'pending'
    ];

    /**
     * Get the review status options.
     */
    public static function getStatuses(): array
    {
        return [
            'pending' => 'Pending',
            'approved' => 'Approved',
            'rejected' => 'Rejected'
        ];
    }

    /**
     * Get the product that owns the review.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}