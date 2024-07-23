<?php

use App\Http\Controllers\{
    CartController,
    CategoryController,
    CheckoutController,
    HomepageController,
    RoleController,
    Misc\GaugeReadingController,
    Admin\DashboardController,
    Admin\ProfileController,
};
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth', 'verified']], function (){

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('profile', ProfileController::class)->except(['index', 'show']);
    Route::resource('category', CategoryController::class)->except('show');
    Route::resource('role', RoleController::class);
});


require __DIR__.'/auth.php';

Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('cart', [CartController::class, 'index'])->name('cart');

# Checkout
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');

#Upload Bulk Data
Route::get('json', [HomepageController::class, 'checkJson'])->name('checkJson');
Route::get('upload', [GaugeReadingController::class, 'index'])->name('upload.csv');
