<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\ShopController;
use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\BlogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('website.home');
})->name('home');

// Shop Routes
Route::prefix('shop')->name('shop.')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('index');
    Route::get('/product/{product:slug}', [ShopController::class, 'show'])->name('product');
    Route::post('/product/{product}/review', [App\Http\Controllers\Website\ProductReviewController::class, 'store'])->name('product.review');
});

// About Route
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Contact Routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

// Blog Routes
Route::prefix('blogs')->name('blogs.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/search', [BlogController::class, 'search'])->name('search');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('cart/update/{product}', [CartController::class, 'update'])->name('cart.update');

// Wishlist Routes
Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('wishlist/add/{product}', [WishlistController::class, 'add'])->name('wishlist.add');
Route::post('wishlist/remove/{product}', [WishlistController::class, 'remove'])->name('wishlist.remove');

// Contact Routes
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

// API Routes for Product Actions
Route::get('/cart', [ShopController::class, 'cart'])->name('cart.index');
Route::get('/checkout', [ShopController::class, 'checkout'])->name('checkout');

Route::prefix('api')->group(function () {
    Route::post('/cart/add', [ShopController::class, 'addToCart']);
    Route::post('/cart/remove', [ShopController::class, 'removeFromCart']);
    Route::post('/wishlist/add', [ShopController::class, 'addToWishlist']);
    Route::get('/products/{product:slug}/quick-view', [ShopController::class, 'quickView']);
});
