<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_settings', function (Blueprint $table) {
            $table->id();
            
            // Hero Section
            $table->string('hero_subtitle');
            $table->string('hero_title');
            $table->text('hero_description');
            $table->string('button_1_text')->nullable();
            $table->string('button_1_link')->nullable();
            $table->string('button_2_text')->nullable();
            $table->string('button_2_link')->nullable();
            
            // Counter Section
            $table->string('counter_title');
            $table->string('review_score')->default('4.9');
            $table->integer('review_count')->default(38580);
            $table->string('sales_count')->default('520k+');
            $table->string('worldwide_sales')->default('80M+');
            
            // Features Section
            $table->string('features_subtitle');
            $table->string('features_title');
            $table->json('feature_items')->nullable();
            
            // Products Section
            $table->string('products_subtitle');
            $table->string('products_title');
            $table->text('products_description');
            
            // Video Section
            $table->string('video_url')->nullable();
            
            // Testimonial Section
            $table->string('testimonial_image')->nullable();
            
            // Newsletter Section
            $table->string('newsletter_subtitle');
            $table->string('newsletter_title');
            $table->text('newsletter_description');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_settings');
    }
};