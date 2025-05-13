<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class HomeSetting extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'about_features',
        'hero_subtitle',
        'popular_products_subtitle',
        'popular_products_title',
        'hero_title',
        'hero_description',
        'button_1_text',
        'button_1_link',
        'button_2_text',
        'button_2_link',
        'counter_title',
        'review_score',
        'review_count',
        'hero_image',
        'exp_title',
        'promo_url',
        'promo_image',
        'exp_count',
        'sales_title',
        'sales_count',
        'worldwide_sales',
        'features_subtitle',
        'features_title',
        'feature_items',
        'products_subtitle',
        'products_title',
        'products_description',
        'video_url',
        'testimonial_image',
        'newsletter_subtitle',
        'about_subtitle',
        'about_title',
        'about_description',
        'about_button_text',
        'about_button_link',
        'about_features',
        'about_image',
        'newsletter_title',
        'newsletter_description',
        'blogs_subtitle',
        'blogs_title',
        'hero_bg_3',
        'blogs_button_text',
        'faq_subtitle',
        'faq_title',
        'faq_button_text',
        'faq_items',
        'faq_form_subtitle',
        'faq_form_title',
        'faq_bg_image',
    ];

    protected $casts = [
        'feature_items' => 'array',
        'about_features' => 'array',
        'review_count' => 'integer',
        'faq_items' => 'array',
    ];

//    protected static function booted(): void
//    {
//        parent::booted();
//
//        static::saved(function ($model) {
//            // This will run after the model is saved
//            $updated = collect($model->feature_items)->map(function ($item, $index) use ($model) {
//                $media = $model->getMedia('feature_icons')[$index] ?? null;
//                if ($media) {
//                    $item['icon_url'] = $media->getUrl();
//                }
//                return $item;
//            });
//
//            // Update the model after modifying the feature items
//            $model->update(['feature_items' => $updated]);
//        });
//    }

    public function registerMediaCollections(): void
    {
        // Hero Section Images
        $this->addMediaCollection('hero_image')
            ->singleFile();
        $this->addMediaCollection('hero_bg_1')
            ->singleFile();
        $this->addMediaCollection('hero_bg_2')
            ->singleFile();
        $this->addMediaCollection('hero_bg_3')
            ->singleFile();

        // Features Section Images
        $this->addMediaCollection('features_main_image')
            ->singleFile();
        $this->addMediaCollection('features_shape_1')
            ->singleFile();
        $this->addMediaCollection('features_shape_2')
            ->singleFile();

        // Video Section Image
        $this->addMediaCollection('video_bg')
            ->singleFile();

        // About Section Images
        $this->addMediaCollection('about_image')
            ->singleFile();
        $this->addMediaCollection('about_feature_icons');

        // Newsletter Section Images
        $this->addMediaCollection('newsletter_image')
            ->singleFile();
        // Popular Products Section Images
        $this->addMediaCollection('popular_products_bg')
            ->singleFile();


        // Testimonial Images
        $this->addMediaCollection('testimonial_image')
            ->singleFile();
            
        // FAQ Section Images
        $this->addMediaCollection('faq_bg')
            ->singleFile();
            
        // About Section Icons
        $this->addMediaCollection('about_feature_icons');
    }
}
