<?php

use App\Events\MessageNotification;
use App\Http\Controllers\Admin\{
    CategoryController,
    ChatController,
    CustomerController,
    DashboardController,
    PermissionController,
    ProfileController,
    RoleController
};
use App\Http\Controllers\{ CartController, CheckoutController, HomepageController, PostController};
use App\Http\Controllers\Misc\FileUploadController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'verified'], function () {

    Route::group(['prefix' => 'admin', 'middleware' => ['user:admin']], function () {
        Route::resource(name: 'role', controller: RoleController::class);
        Route::post(uri: 'roles-assign', action: [RoleController::class, 'assignRole'])->name('role.assign');
        Route::resource(name: 'permission', controller: PermissionController::class);
        Route::resource(name: 'profile', controller: ProfileController::class)->except(methods: ['index', 'show']);
        Route::resource(name: 'category', controller: CategoryController::class)->except(methods: 'show');

        Route::get(uri: 'chat', action: [ChatController::class, 'index'])->name('chat.index');
        Route::get(uri: 'dashboard', action:[DashboardController::class, 'index'])->name('dashboard');
        Route::get(uri: 'customer', action: [CustomerController::class, 'index'])->name('customer.index');

        #Upload Bulk Data
        Route::get('json', [HomepageController::class, 'checkJson'])->name('checkJson');

        Route::get('file/upload', [FileUploadController::class, 'index'])->name('file.index');
        Route::get('file/save', [FileUploadController::class, 'store'])->name('file.store');
    });

    Route::group(['middleware' => ['user:user']], function (){
        Route::get('checkrole', function (){
//            return redirect()->route('home');
        });
        Route::get('cart', [CartController::class, 'index'])->name('cart');
    });
});

require __DIR__.'/auth.php';

Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::get('post', [PostController::class, 'index'])->name('blog.index');

# Checkout
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');


Route::get('event', function (){
    broadcast(new MessageNotification("Check the message"));
});

Route::get('listen', function (){
    return view('admin.chat.index');
});
