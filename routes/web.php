<?php

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

Route::get('/', [App\Http\Livewire\Landing\Home\Index::class, 'render'])->name('landing');

Route::prefix('/')->name('landing.')->group(function () {
    Route::prefix('home')->name('home.')->namespace('App\Http\Livewire\Landing\Home')->group(function () {
        Route::get('', 'Index@render')->name('index');
    });
    Route::prefix('menu')->name('menu.')->namespace('App\Http\Livewire\Landing\Menu')->group(function () {
        Route::get('', 'Index@render')->name('index');
        Route::prefix('detail')->name('detail.')->group(function () {
            Route::get('', 'Detail\Index@render')->name('index');
        });
    });
    Route::prefix('cart')->name('cart.')->namespace('App\Http\Livewire\Landing\Cart')->group(function () {
        Route::get('', 'Index@render')->name('index');
    });
    Route::prefix('order')->name('order.')->namespace('App\Http\Livewire\Landing\Order')->group(function () {
        Route::get('', 'Index@render')->name('index');
    });
    Route::prefix('checkout')->name('checkout.')->namespace('App\Http\Livewire\Landing\Checkout')->group(function () {
        Route::get('', 'Index@render')->name('index');
    });
    Route::prefix('invoice')->name('invoice.')->namespace('App\Http\Livewire\Landing\Invoice')->group(function () {
        Route::get('', 'Index@render')->name('index');
    });
});

// STORAGE FILE ROUTE
Route::prefix('storage')->name('storage.')->namespace('App\Http\Controllers')->group(function () {
    Route::get('show/{path?}', 'FileStorage@show')->name('show');
    Route::get('download/{path?}', 'FileStorage@download')->name('download');
});
