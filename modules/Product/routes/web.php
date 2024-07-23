<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\ProductController;
use Modules\Product\Http\Controllers\ProductItemController;

Route::group([ 'prefix' => 'admin', 'middleware' => ['auth', 'verified', 'admin']], function (){
    Route::resource('product', ProductController::class)->except('show');
    Route::resource('product-item', ProductItemController::class)->except('show');
});
