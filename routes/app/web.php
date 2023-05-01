<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Web\BookController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\AboutController;
use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\CheckoutController;
use App\Http\Controllers\Web\RegionalController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Web\DashboardController;

Route::group(['domain' => ''], function () {
    Route::get('auth', [AuthController::class, 'index'])->name('auth.index');
    Route::post('auth/login', [AuthController::class, 'do_login'])->name('auth.login');
    Route::post('auth/register', [AuthController::class, 'do_register'])->name('auth.register');

    Route::prefix('')->name('web.')->group(function () {
        Route::redirect('/', 'dashboard', 301);
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // BOOKS
        Route::prefix('books')->name('books.')->group(function () {
            Route::get('novel', [BookController::class, 'novel'])->name('novel');
            Route::get('cerpen', [BookController::class, 'cerpen'])->name('cerpen');
            Route::get('komik', [BookController::class, 'komik'])->name('komik');
            Route::get('ensiklopedia', [BookController::class, 'ensiklopedia'])->name('ensiklopedia');
            Route::get('biografi', [BookController::class, 'biografi'])->name('biografi');
            Route::get('dongeng', [BookController::class, 'dongeng'])->name('dongeng');
            Route::get('show/{book}', [BookController::class, 'show'])->name('show');
        });

        Route::get('about', [AboutController::class, 'index'])->name('about');
        Route::get('contact', [ContactController::class, 'index'])->name('contact');

        Route::middleware('can:User')->group(function () {
            // CART
            Route::get('counter_cart', [CartController::class, 'notif'])->name('counter_cart');
            Route::get('cart', [CartController::class, 'index'])->name('cart.index');
            Route::post('cart/add', [CartController::class, 'store'])->name('cart.add');
            Route::patch('cart/increase/{cart}', [CartController::class, 'increase'])->name('cart.increase');
            Route::patch('cart/decrease/{cart}', [CartController::class, 'decrease'])->name('cart.decrease');
            Route::patch('cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');
            Route::delete('cart/delete/{cart}', [CartController::class, 'destroy'])->name('cart.delete');

            // Checkout
            Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
            Route::post('check', [CheckoutController::class, 'check'])->name('check');
            Route::post('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
            Route::get('checkout/{id}', [CheckoutController::class, 'checkout_detail'])->name('checkout.detail');

            // ORDER
            Route::get('order', [OrderController::class, 'index'])->name('order.index');
            Route::get('order/{order}', [OrderController::class, 'show'])->name('order.show');

            // REGIONAL
            Route::post('regional/province', [RegionalController::class, 'province'])->name('regional.province');
            Route::post('regional/city', [RegionalController::class, 'city'])->name('regional.city');
            Route::post('regional/subdistrict', [RegionalController::class, 'subdistrict'])->name('regional.subdistrict');

            
            Route::get('logout', [AuthController::class, 'do_logout'])->name('logout');

            // PROFILE
            Route::get('profile', [ProfileController::class, 'index'])->name('profile');
            Route::post('profile/update', [ProfileController::class, 'do_update_profile'])->name('profile.do_update');
            Route::post('profile/change-password', [ProfileController::class, 'do_change_password'])->name('profile.do_change_password');
        });
    });
});
