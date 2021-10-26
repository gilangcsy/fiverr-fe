<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Seller\DashboardController;
use App\Http\Controllers\Seller\ServicesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('seller/index');
});

Route::prefix('auth/')
    ->namespace('Auth')
    ->group(function () {
        Route::get('', [AuthController::class, 'index'])->name('auth.index');
        Route::post('', [AuthController::class, 'store'])->name('auth.login');

        Route::post('/logout', [AuthController::class, 'destroy'])->name('auth.logout');
    });

Route::prefix('seller/')
    ->namespace('Seller')
    ->middleware('seller')
    ->group(function () {
        Route::get('', [DashboardController::class, 'index'])->name('index'); 
        Route::prefix('services/')
            ->namespace('Services')
            ->group(function () {
            Route::get('', [ServicesController::class, 'index'])->name('services.index');
            Route::get('/create', [ServicesController::class, 'create'])->name('services.create');
            Route::get('/session', [ServicesController::class, 'session'])->name('services.session');
        });
    });