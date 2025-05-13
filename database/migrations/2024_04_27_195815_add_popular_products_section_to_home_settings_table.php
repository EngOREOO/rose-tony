<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('home_settings', function (Blueprint $table) {
            $table->string('popular_products_subtitle')->nullable();
            $table->string('popular_products_title')->nullable();
            $table->json('about_features')->nullable();
        });
    }

    public function down()
    {
        Schema::table('home_settings', function (Blueprint $table) {
            $table->dropColumn([
                'popular_products_subtitle',
                'popular_products_title',
                'about_features'
            ]);
        });
    }
};