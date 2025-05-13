<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('home_settings', function (Blueprint $table) {
            $table->string('about_image')->nullable()->after('about_description');
        });
    }

    public function down()
    {
        Schema::table('home_settings', function (Blueprint $table) {
            $table->dropColumn('about_image');
        });
    }
};