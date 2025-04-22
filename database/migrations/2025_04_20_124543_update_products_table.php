<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Ensure required columns exist
            if (!Schema::hasColumn('products', 'name')) {
                $table->string('name');
            }
            if (!Schema::hasColumn('products', 'slug')) {
                $table->string('slug')->unique();
            }
            if (!Schema::hasColumn('products', 'description')) {
                $table->longText('description')->nullable();
            }
            if (!Schema::hasColumn('products', 'price')) {
                $table->decimal('price', 10, 2);
            }
            if (!Schema::hasColumn('products', 'discounted_price')) {
                $table->decimal('discounted_price', 10, 2)->nullable();
            }
            if (!Schema::hasColumn('products', 'quantity')) {
                $table->integer('quantity')->default(0);
            }
            if (!Schema::hasColumn('products', 'in_stock')) {
                $table->boolean('in_stock')->default(true);
            }

            // Product details
            if (!Schema::hasColumn('products', 'benefits')) {
                $table->longText('benefits')->nullable();
            }
            if (!Schema::hasColumn('products', 'ingredients')) {
                $table->longText('ingredients')->nullable();
            }
            if (!Schema::hasColumn('products', 'usage')) {
                $table->longText('usage')->nullable();
            }
            if (!Schema::hasColumn('products', 'precautions')) {
                $table->longText('precautions')->nullable();
            }
            if (!Schema::hasColumn('products', 'notes')) {
                $table->longText('notes')->nullable();
            }
            if (!Schema::hasColumn('products', 'advantages')) {
                $table->longText('advantages')->nullable();
            }

            // Product specifications
            if (!Schema::hasColumn('products', 'size')) {
                $table->string('size')->nullable();
            }
            if (!Schema::hasColumn('products', 'video_input_type')) {
                $table->enum('video_input_type', ['upload', 'link'])->default('link');
            }
            if (!Schema::hasColumn('products', 'video_file')) {
                $table->string('video_file')->nullable();
            }
            if (!Schema::hasColumn('products', 'video_link')) {
                $table->string('video_link')->nullable();
            }

            // Category relationship
            if (!Schema::hasColumn('products', 'home_categories_id')) {
                $table->foreignId('home_categories_id')
                    ->nullable()
                    ->constrained('home_categories')
                    ->nullOnDelete();
            }

            // Meta information
            if (!Schema::hasColumn('products', 'meta_description')) {
                $table->text('meta_description')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Only drop columns that we added
            $newColumns = [
                'meta_description',
                'video_input_type',
                'video_file',
                'video_link',
                'advantages',
                'home_categories_id'
            ];

            foreach ($newColumns as $column) {
                if (Schema::hasColumn('products', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};