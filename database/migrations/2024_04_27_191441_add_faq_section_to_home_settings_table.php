<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('home_settings', function (Blueprint $table) {
            $table->string('faq_subtitle')->nullable();
            $table->string('faq_title')->nullable();
            $table->string('faq_button_text')->nullable();
            $table->json('faq_items')->nullable();
            $table->string('faq_form_subtitle')->nullable();
            $table->string('faq_form_title')->nullable();
            $table->string('faq_bg_image')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('home_settings', function (Blueprint $table) {
            $table->dropColumn([
                'faq_subtitle',
                'faq_title',
                'faq_button_text',
                'faq_items',
                'faq_form_subtitle',
                'faq_form_title',
                'faq_bg_image'
            ]);
        });
    }
};