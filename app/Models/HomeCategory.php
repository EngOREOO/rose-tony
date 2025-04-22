<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeCategory extends Model
{
    protected $table = 'home_categories';
    
    protected $fillable = [
        'name',
        'image',
        'description',
        'meta_tags',
        'meta_description',
        'focus_keywords',
        'slug',

    ];

    protected $casts = [
        'meta_tags' => 'array',  // تركها كما هي، لأنك تخزنها كمصفوفة
        'focus_keywords' => 'array',  // كذلك
        'meta_description' => 'string',  // تأكد من تخزينه كنص
        'slug' => 'string',  // تأكد من تخزينه كنص
    ];
    
    public function setMetaTagsAttribute($value)
    {
        $this->attributes['meta_tags'] = is_array($value) ? implode(',', $value) : $value;
    }

    public function setFocusKeywordsAttribute($value)
    {
        $this->attributes['focus_keywords'] = is_array($value) ? implode(',', $value) : $value;
    }

    

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }
}
