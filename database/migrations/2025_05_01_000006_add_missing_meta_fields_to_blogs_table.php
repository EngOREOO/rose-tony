<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Add new fields if they don't exist
            if (!Schema::hasColumn('blogs', 'og_url')) {
                $table->string('og_url')->nullable();
            }
            if (!Schema::hasColumn('blogs', 'og_site_name')) {
                $table->string('og_site_name')->nullable();
            }
            if (!Schema::hasColumn('blogs', 'twitter_card')) {
                $table->string('twitter_card')->nullable();
            }

            // Ensure all meta fields are present
            if (!Schema::hasColumn('blogs', 'meta_title')) {
                $table->string('meta_title')->nullable();
            }
            if (!Schema::hasColumn('blogs', 'meta_description')) {
                $table->text('meta_description')->nullable();
            }
            if (!Schema::hasColumn('blogs', 'meta_keywords')) {
                $table->json('meta_keywords')->nullable();
            }
            if (!Schema::hasColumn('blogs', 'robots')) {
                $table->string('robots')->default('index, follow');
            }
            if (!Schema::hasColumn('blogs', 'og_locale')) {
                $table->string('og_locale')->default('ar_AR');
            }
            if (!Schema::hasColumn('blogs', 'og_type')) {
                $table->string('og_type')->default('article');
            }
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn([
                'og_url',
                'og_site_name',
                'twitter_card',
                'meta_title',
                'meta_description',
                'meta_keywords',
                'robots',
                'og_locale',
                'og_type'
            ]);
        });
    }
};