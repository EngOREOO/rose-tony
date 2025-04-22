<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->text('head_text');
            $table->text('paragraph');
            $table->text('video_url')->nullable();
            $table->text('under_video_image')->nullable();
            $table->text('why_choose_us')->nullable();
            $table->text('our_mission')->nullable();
            $table->text('our_principles')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
