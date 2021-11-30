<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\General\HomeController;
use App\Http\Controllers\General\TransactionController;
use App\Http\Controllers\Seller\DashboardController;
use App\Http\Controllers\Seller\OrderController;
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

Route::get('/test', function () {
    return 'hola!';
});

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/explore', [HomeController::class, 'explore'])->name('home.explore');
Route::get('detail/{id}', [HomeController::class, 'show'])->name('home.show');
Route::get('checkout/{id}', [HomeController::class, 'create'])->name('home.create');
Route::post('payment', [HomeController::class, 'store'])->name('home.store');

Route::prefix('mytransaction/')
    ->namespace('My Transaction')
    ->group(function () {
        Route::get('', [TransactionController::class, 'index'])->name('transaction.index');
    });

Route::prefix('auth/')
    ->namespace('Auth')
    ->group(function () {
        Route::get('', [AuthController::class, 'index'])->name('auth.index');
        Route::get('create', [AuthController::class, 'create'])->name('auth.create');
        Route::post('', [AuthController::class, 'store'])->name('auth.login');
        Route::post('create', [AuthController::class, 'make'])->name('auth.store');

        Route::post('/logout', [AuthController::class, 'destroy'])->name('auth.logout');
    });
	

	
Route::prefix('admin/')
	->namespace('Admin')
	->group(function () {
		Route::get('', [AdminController::class, 'index'])->name('admin.dashboard');
		Route::prefix('payment/')
			->namespace('Payment')
			->group(function () {
				Route::get('', [PaymentController::class, 'index'])->name('payment.index');
				Route::patch('{id}', [PaymentController::class, 'update'])->name('payment.update');
		});
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

		Route::prefix('orders/')
            ->namespace('Orders')
            ->middleware('seller')
            ->group(function () {
            	Route::get('', [OrderController::class, 'index'])->name('orders.index');
            	Route::get('/create', [OrderController::class, 'create'])->name('orders.create');
            	Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('orders.edit');
            	Route::post('/', [OrderController::class, 'store'])->name('orders.store');
            	Route::delete('/{id}', [OrderController::class, 'destroy'])->name('orders.delete');
            	Route::patch('/{id}', [OrderController::class, 'update'])->name('orders.update');
    });
});