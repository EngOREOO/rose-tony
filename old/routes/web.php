<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Home route
Route::get('/tint', [HomeController::class, 'index'])->name('home');
Route::get('/rosefume', [HomeController::class, 'perfume'])->name('rosefume');

// Checkout routes
Route::get('/checkout/{productId}', [CheckoutController::class, 'showCheckout'])->name('checkout.show');
Route::post('/checkout/{productId}', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
Route::get('/order/confirmation/{orderId}', [CheckoutController::class, 'showConfirmation'])->name('order.confirmation');
