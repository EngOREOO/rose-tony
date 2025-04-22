<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Basic SEO fields
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable()->change();
            $table->string('canonical_url')->nullable();
            $table->json('meta_robots')->nullable();
            $table->json('meta_keywords')->nullable();

            // Open Graph meta tags
            $table->string('og_locale')->default('ar_AR');
            $table->string('og_type')->default('product');
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_url')->nullable();
            $table->string('og_site_name')->nullable();
            $table->string('og_author_url')->nullable();
            $table->string('og_section')->nullable();
            $table->json('og_tags')->nullable();
            $table->string('og_image')->nullable();
            $table->string('og_image_secure')->nullable();
            $table->integer('og_image_width')->nullable();
            $table->integer('og_image_height')->nullable();
            $table->string('og_image_alt')->nullable();
            $table->string('og_image_type')->nullable();
            $table->timestamp('og_updated_time')->nullable();
            
            // Article timestamps
            $table->timestamp('published_time')->nullable();
            $table->timestamp('modified_time')->nullable();

            // Twitter Card meta tags
            $table->string('twitter_card')->default('summary_large_image');
            $table->string('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->string('twitter_creator')->nullable();
            $table->string('twitter_image')->nullable();
            $table->string('twitter_label1')->nullable();
            $table->string('twitter_data1')->nullable();
            $table->string('twitter_label2')->nullable();
            $table->string('twitter_data2')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'meta_title',
                'canonical_url',
                'meta_robots',
                'meta_keywords',
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
                'twitter_data2'
            ]);
            
            // Reset meta_description to its original state if needed
            $table->string('meta_description')->nullable()->change();
        });
    }
};