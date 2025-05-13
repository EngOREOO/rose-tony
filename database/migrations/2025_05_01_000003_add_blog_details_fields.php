<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('blog_comments')) {
            Schema::create('blog_comments', function (Blueprint $table) {
                $table->id();
                $table->foreignId('blog_id')->constrained('blogs')->onDelete('cascade');
                $table->string('name');
                $table->string('email');
                $table->text('comment');
                $table->foreignId('parent_id')->nullable()->constrained('blog_comments')->onDelete('cascade');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('blog_categories')) {
            Schema::create('blog_categories', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->integer('posts_count')->default(0);
                $table->timestamps();
            });
        }

        if (!Schema::hasColumn('blogs', 'category_id')) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->foreignId('category_id')->nullable()->constrained('blog_categories')->nullOnDelete();
                $table->json('gallery_images')->nullable();
                $table->text('quote_text')->nullable();
                $table->string('quote_author')->nullable();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('blog_comments');
        Schema::dropIfExists('blog_categories');
        
        Schema::table('blogs', function (Blueprint $table) {
            if (Schema::hasColumn('blogs', 'category_id')) {
                $table->dropForeign(['category_id']);
                $table->dropColumn(['category_id', 'gallery_images', 'quote_text', 'quote_author']);
            }
        });
    }
};