<?php

namespace App\Providers;

use App\Models\Product;
use App\Observers\ProductObserver;
use App\View\Composers\FooterComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register view composers
        View::composer('website.home', function ($view) {
            $homeSettings = \App\Models\HomeSetting::firstOrNew();
            $view->with('homeSettings', $homeSettings);
        });
        Product::observe(ProductObserver::class);
        View::composer('website.partials.footer', FooterComposer::class);
    }
}
