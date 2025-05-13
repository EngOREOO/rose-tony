<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\OrderItem; // Added import for OrderItem
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;

    /**
     * Get the reviews for the product.
     */
    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }


    protected $table = 'products';

    protected $fillable = [
        "name",
        "price",
        "description",
        "slug",
        "price_after",
        "quantity",
        "in_stock",
        "category_id",
        "home_category_id",
        "benefits",
        "ingredients",
        "usage",
        "discounted_price",
        "gift_products",
        "related_products",
        "precautions",
        "size",
        "video",
        'variation_type',
        'scents_list',
        'colors_list',
        'video_input_type',
        'video_file',
        'video_link',
        'meta_title',
        'meta_description',
        'canonical_url',
        'meta_robots',
        'meta_keywords',
        'meta_tags',
        'focus_keywords',
        'og_locale',
        'og_type',
        'og_title',
        'og_description',
        'og_url',
        'og_site_name',
        'og_author_url',
        'og_section',
        'og_tags',
        'og_image',
        'og_image_secure',
        'og_image_width',
        'og_image_height',
        'og_image_alt',
        'og_image_type',
        'og_updated_time',
        'published_time',
        'modified_time',
        'twitter_card',
        'twitter_title',
        'twitter_description',
        'twitter_creator',
        'twitter_image',
        'twitter_label1',
        'twitter_data1',
        'twitter_label2',
        'twitter_data2',
        'customer_reviews',
        'advatigs',
        'notes',
        'partners_logos',
    ];

    protected $casts = [
        "price" => "decimal:2",
        "in_stock" => "boolean",
        "quantity" => "integer",
        "gift_products" => "array",
        "related_products" => "array",
        "customer_reviews" => "json",
        "meta_tags" => "json",
        "meta_robots" => "json",
        "meta_keywords" => "json",
        "focus_keywords" => "json",
        "og_tags" => "json",
        "og_image_width" => "integer",
        "og_image_height" => "integer",
        "og_updated_time" => "datetime",
        "published_time" => "datetime",
        "modified_time" => "datetime",
        "meta_description" => "string",
        "partners_logos" => "json",
        "og_type" => "string",
        "og_locale" => "string",
        "twitter_card" => "string"
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    // Removed setMetaTagsAttribute - Relying on $casts
    // public function setGiftProdutsAttribute($value)
    // {
    //     if (is_array($value)) {
    //         $this->attributes['gift_products'] = json_encode($value);
    //     } else {
    //         $this->attributes['gift_products'] = $value;
    //     }
    // }
    // public function setRelatedProdutsAttribute($value)
    // {
    //     if (is_array($value)) {
    //         $this->attributes['related_products'] = json_encode($value);
    //     } else {
    //         $this->attributes['related_products'] = $value;
    //     }
    // }
    // Removed setFocusKeywordsAttribute - Relying on $casts
    // Removed setCustomerReviewsAttribute - Relying on $casts
    // Note: FileUpload data for customer_reviews might need specific handling
    // depending on whether you store paths or structured data.
    // The 'json' cast will handle basic array<->JSON conversion.
    public function giftProducts()
    {
        return $this->belongsToMany(Product::class, 'product_gift_products', 'product_id', 'gift_product_id');
    }

    // علاقة Many-to-Many مع related_products
    public function relatedProducts()
    {
        return $this->belongsToMany(Product::class, 'product_related_products', 'product_id', 'related_product_id');
    }

    // Removed setGiftProductsAttribute - Relying on $casts
    // Removed setRelatedProductsAttribute - Relying on $casts
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('product_images')
            ->useFallbackUrl(asset('website/assets/img/product/product_1_1.png'));
    }

    public function getImageUrlAttribute()
    {
        $media = $this->getFirstMedia('product_images');
        if ($media) {
            // Format: http://domain.com/storage/app/public/11/01JQ3X2NBQ5GPV645APMJZ7N4M.webp
            return asset('storage/app/public/' . $media->id . '/' . $media->file_name);
        }
        return asset('website/assets/img/product/product_1_1.png');
    }

    /**
     * Get all media URLs for the product
     */
    public function getAllImagesAttribute()
    {
        return $this->getMedia('product_images')->map(function ($media) {
            return asset('storage/app/public/' . $media->id . '/' . $media->file_name);
        });
    }

    /**
     * Get the order items for the product.
     */
    public function orderItems(): HasMany // Added return type hint
    {
        return $this->hasMany(OrderItem::class); // Use imported class
    }

    /**
     * Get the orders for the product.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the home category that owns the product.
     */
    public function homeCategory()
    {
        return $this->belongsTo(HomeCategory::class);
    }
}