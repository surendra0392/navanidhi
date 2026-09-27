<?php

use Illuminate\Support\Facades\Route;
use Webkul\Core\Http\Middleware\NoCacheMiddleware;
use Webkul\Shop\Http\Controllers\CartController;
use Webkul\Shop\Http\Controllers\OnepageController;

/**
 * Cart routes.
 */
Route::controller(CartController::class)
    ->prefix('checkout/cart')
    ->middleware([NoCacheMiddleware::class])
    ->group(function () {
        Route::get('', 'index')->name('shop.checkout.cart.index');
    });

Route::controller(OnepageController::class)
    ->prefix('checkout/onepage')
    ->middleware([NoCacheMiddleware::class])
    ->group(function () {
        Route::get('', 'index')->name('shop.checkout.onepage.index');

        Route::get('success', 'success')->name('shop.checkout.onepage.success');
    });
