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
        Schema::create('faq_help_section', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Need Help?');
            $table->text('description')->nullable(); // الوصف الأول
            $table->text('notice')->nullable(); // مدة الاسترجاع أو ملاحظة عامة
            $table->string('form_title')->nullable()->default('Have any Question');
            $table->string('button_text')->nullable()->default('Ask Question Now');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq_help_section');
    }
};
