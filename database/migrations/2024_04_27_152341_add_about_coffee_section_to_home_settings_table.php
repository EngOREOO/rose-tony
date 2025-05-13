<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('home_settings', function (Blueprint $table) {
            // About section content
            $table->string('about_subtitle')->nullable();
            $table->string('about_title')->nullable();
            $table->text('about_description')->nullable();
            
            // About section button
            $table->string('about_button_text')->nullable();
            $table->string('about_button_link')->nullable();
            
            // About features stored as JSON
            $table->json('about_features')->nullable();
        });
    }

    public function down()
    {
        Schema::table('home_settings', function (Blueprint $table) {
            $table->string('popular_products_subtitle')->nullable();
            $table->string('popular_products_title')->nullable();
            $table->dropColumn([
                'about_subtitle',
                'about_title',
                'about_description',
                'about_button_text',
                'about_button_link',
                'about_features'
            ]);
        });
    }
};