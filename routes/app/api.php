<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\CheckoutController;
use App\Http\Controllers\API\DashboardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(
    [
        'domain' => 'https://new.dev',
        'middleware' => 'api',
        'prefix' => 'auth',
        'namespace' => 'Auth',
    ],
    function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('register', [AuthController::class, 'register']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::get('me', [AuthController::class, 'me']);
    }
);
Route::group([
    'domain' => 'https://wops.dev',
    'middleware' => 'api',
], function () {
    Route::get('book', [BookController::class, 'index']);
        Route::get('book/{book}', [BookController::class, 'show']);
        Route::post('book', [BookController::class, 'store']);
        Route::put('book/{book}', [BookController::class, 'update']);
        Route::delete('book/{book}', [BookController::class, 'destroy']);

        Route::get('dashboard', [DashboardController::class, 'index']);
        Route::get('komik', [DashboardController::class, 'komik']);
        Route::get('novel', [DashboardController::class, 'novel']);
        Route::get('cerpen', [DashboardController::class, 'cerpen']);
        Route::get('ensiklopedia', [DashboardController::class, 'ensiklopedia']);
        Route::get('biografi', [DashboardController::class, 'biografi']);
        Route::get('dongeng', [DashboardController::class, 'dongeng']);
        Route::get('show/{book}', [BookController::class, 'show']);
            Route::get('cart', [CartController::class, 'index']);
            Route::post('cart', [CartController::class, 'store']);
            Route::delete('cart/{cart}', [CartController::class, 'destroy']);
            Route::patch('cart/{cart}', [CartController::class, 'update']);

            Route::get('checkout', [CheckoutController::class, 'store']);
});