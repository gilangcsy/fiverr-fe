<?php

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

Route::prefix('seller/')
    ->namespace('Seller')
    ->group(function () {
        Route::get('', [DashboardController::class, 'index'])->name('index'); 
        Route::prefix('services/')
            ->namespace('Services')
            ->group(function () {
            Route::get('', [ServicesController::class, 'index'])->name('services.index');
        });
    });