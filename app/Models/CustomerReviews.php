<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerReviews extends Model
{
    protected $table = 'customer_reviews';

    protected $fillable = [
        'name',
        'rate',
        'rating_text'
    ];
}
