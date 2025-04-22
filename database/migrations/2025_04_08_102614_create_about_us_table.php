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
            $table->text('address')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->text('questions_text')->nullable();
            $table->text('map_url')->nullable();
            $table->text('contact_head')->nullable();
            $table->text('contact_paragraph')->nullable();
            $table->string('contact_button_text')->nullable();
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
