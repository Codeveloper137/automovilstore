<?php

/**
 * Store front routes.
 */
require 'store-front-routes.php';

/**
 * Customer routes. All routes related to customer
 * in storefront will be placed here.
 */
require 'customer-routes.php';

/**
 * Checkout routes. All routes related to checkout like
 * cart, coupons, etc will be placed here.
 */
require 'checkout-routes.php';


Route::group(['middleware' => ['locale', 'theme', 'currency']], function () {
    
Route::get('/collections', function () {
        return view('shop::categories.collections');
    })->name('shop.collections');

    Route::get('/about-us', function () {
        return view('shop::pages.about-us');
    })->name('shop.about-us');

    Route::get('/envios', function () {
        return view('shop::pages.envios');
    })->name('shop.envios');

    Route::get('/devoluciones', function () {
        return view('shop::pages.devoluciones');
    })->name('shop.devoluciones');

    Route::get('/garantia', function () {
        return view('shop::pages.garantia');
    })->name('shop.garantia');

    Route::get('/faq', function () {
        return view('shop::pages.faq');
    })->name('shop.faq');

    Route::get('/cookies', function () {
        return view('shop::pages.cookies');
    })->name('shop.cookies');

    Route::get('/privacidad', function () {
        return view('shop::pages.privacidad');
    })->name('shop.privacidad');

    Route::get('/terminos', function () {
        return view('shop::pages.terminos');
    })->name('shop.terminos');

});
