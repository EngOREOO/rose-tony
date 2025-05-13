<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Get all existing records
        $settings = DB::table('home_settings')->get();

        foreach ($settings as $setting) {
            if ($setting->about_features) {
                $features = json_decode($setting->about_features, true);
                
                // Add icon field to each feature if it doesn't exist
                foreach ($features as &$feature) {
                    if (!isset($feature['icon'])) {
                        $feature['icon'] = null;
                    }
                }

                // Update the record with modified features
                DB::table('home_settings')
                    ->where('id', $setting->id)
                    ->update(['about_features' => json_encode($features)]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $settings = DB::table('home_settings')->get();

        foreach ($settings as $setting) {
            if ($setting->about_features) {
                $features = json_decode($setting->about_features, true);
                
                // Remove icon field from each feature
                foreach ($features as &$feature) {
                    unset($feature['icon']);
                }

                // Update the record with modified features
                DB::table('home_settings')
                    ->where('id', $setting->id)
                    ->update(['about_features' => json_encode($features)]);
            }
        }
    }
};