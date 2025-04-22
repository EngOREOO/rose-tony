<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductObserver
{
    /**
     * Handle the Product "creating" event.
     */
    public function creating(Product $product): void
    {
        if (empty($product->slug)) {
            $product->slug = Str::slug($product->name);
        }
    }

    /**
     * Handle the Product "updating" event.
     */
    public function updating(Product $product): void
    {
        if ($product->isDirty('name') && empty($product->slug)) {
            $product->slug = Str::slug($product->name);
        }
    }
}