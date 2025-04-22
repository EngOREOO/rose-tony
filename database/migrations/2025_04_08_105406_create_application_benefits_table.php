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
        Schema::create('application_benefits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('about_us_id')->constrained('about_us')->onDelete('cascade');
            $table->text('benefit_text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_benefits');
    }
};
