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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('country');
            $table->string('street_address');
            $table->string('apartment')->nullable();
            $table->string('city');
            $table->string('region');
            $table->string('postal_code');
            $table->string('phone')->nullable();
            $table->text('notes')->nullable();
            $table->enum('payment_method', ['cash_on_delivery'])->default('cash_on_delivery');
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending');
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
