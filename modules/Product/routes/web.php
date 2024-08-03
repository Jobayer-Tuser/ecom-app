<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\CampaignController;
use Modules\Product\Http\Controllers\ProductItemController;
use Modules\Product\Http\Controllers\ProductVariantController;

Route::group([ 'prefix' => 'admin', 'middleware' => ['auth', 'verified', 'admin']], function (){
    Route::resource('product', CampaignController::class)->except('show');
    Route::resource('product-item', ProductItemController::class)->except('show');
    Route::resource('product-variant', ProductVariantController::class)->except('show');
});
