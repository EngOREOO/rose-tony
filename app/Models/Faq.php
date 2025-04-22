<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faq extends Model
{
    protected $fillable = ['category_id', 'question', 'answer', 'order'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(FaqCategory::class);
    }
}
