<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Seller\DashboardController;
use App\Http\Controllers\Seller\ServiceFeatureController;
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
    return view('dashboard/seller/index');
})->middleware('seller');

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
            ->middleware('seller')
            ->group(function () {
            	Route::get('', [ServicesController::class, 'index'])->name('services.index');
            	Route::get('/create', [ServicesController::class, 'create'])->name('services.create');
            	Route::get('/edit/{id}', [ServicesController::class, 'edit'])->name('services.edit');
            	// Route::get('/user/{id}', [ServicesController::class, 'message'])->name('services.message');
            	Route::post('/', [ServicesController::class, 'store'])->name('services.store');
            	Route::delete('/{id}', [ServicesController::class, 'destroy'])->name('services.delete');
            	Route::patch('/{id}', [ServicesController::class, 'update'])->name('services.update');

				Route::prefix('features/')
					->namespace('Features')
					->middleware('seller')
					->group(function () {
						Route::get('/{ServiceId}', [ServiceFeatureController::class, 'index'])->name('features.index');
						Route::delete('/delete/{FeatureId}', [ServiceFeatureController::class, 'destroy'])->name('features.delete');
						Route::patch('/{ServiceId}/update/{FeatureId}', [ServiceFeatureController::class, 'update'])->name('features.update');
						Route::post('/{ServiceId}', [ServiceFeatureController::class, 'store'])->name('features.store');
						Route::get('/{ServiceId}/create', [ServiceFeatureController::class, 'create'])->name('features.create');
						Route::get('/{ServiceId}/edit/{FeatureId}', [ServiceFeatureController::class, 'edit'])->name('features.edit');
				});
        });
    });