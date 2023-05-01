<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DashboardController;

Route::group(['domain' => ''], function () {
    Route::get('admin/auth', [AuthController::class, 'index'])->name('auth.index');
    Route::prefix('admin/')->name('admin.')->group(function () {
        Route::prefix('auth')->name('auth.')->group(function () {
            Route::post('login', [AuthController::class, 'do_login'])->name('login');
        });
        Route::middleware('can:Admin')->group(function () {
            Route::redirect('/', 'dashboard', 301);
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::resource('books', BookController::class);
            Route::get('order', [OrderController::class, 'index'])->name('order.index');
            Route::get('order/{order}', [OrderController::class, 'show'])->name('order.show');
            Route::patch('order/accept/{order}', [OrderController::class, 'accept'])->name('order.accept');
            Route::patch('order/reject/{order}', [OrderController::class, 'reject'])->name('order.reject');
            Route::get('logout', [AuthController::class, 'do_logout'])->name('logout');
            Route::get('profile', [ProfileController::class, 'index'])->name('profile');
            Route::patch('profile/change-password', [ProfileController::class, 'cpassword'])->name('cpassword');
        });
    });
});
