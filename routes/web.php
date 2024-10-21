<?php

use App\Events\MessageNotification;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Misc\GaugeReadingController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\RoleController;

Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth', 'verified']], function (){

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('profile', ProfileController::class)->except(['index', 'show']);
    Route::resource('category', CategoryController::class)->except('show');
    Route::resource('role', RoleController::class);

    Route::get('customer', [CustomerController::class, 'index'])->name('customer.index');

    Route::get('chat', [ChatController::class, 'index'])->name('chat.index');
});


require __DIR__.'/auth.php';

Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('cart', [CartController::class, 'index'])->name('cart');

# Checkout
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');

#Upload Bulk Data
Route::get('json', [HomepageController::class, 'checkJson'])->name('checkJson');
Route::get('upload', [GaugeReadingController::class, 'index'])->name('upload.csv');

Route::get('event', function (){
    broadcast(new MessageNotification("Check the message"));
});

Route::get('listen', function (){
    return view('admin.chat.index');
});
