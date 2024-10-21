<?php

use Illuminate\Support\Facades\Route;

use Modules\Product\Http\Controllers\ProductController;
use Modules\Product\Http\Controllers\ProductItemController;
use Modules\Product\Http\Controllers\ProductVariantController;

Route::group([ 'prefix' => 'admin', 'middleware' => ['auth', 'verified', 'admin']], function (){
    Route::resource('product', ProductController::class)->except('show');
    Route::resource('product-item', ProductItemController::class)->except('show');
    Route::resource('product-variant', ProductVariantController::class)->except('show');
});
