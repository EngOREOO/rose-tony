<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    protected $table = 'faq_categories';

    protected $fillable = [
        'name',
        'order',
    ];

    public $timestamps = true;

    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class, 'category_id');
    }
}
