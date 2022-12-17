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

Route::get('/', App\Http\Livewire\Landing\Home\Index::class)->name('landing');

Route::prefix('/')->name('landing.')->group(function () {
    Route::get('home',  App\Http\Livewire\Landing\Home\Index::class)->name('home');

    Route::prefix('menu')->name('menu.')->group(function () {
        Route::get('', App\Http\Livewire\Landing\Menu\Index::class)->name('index');
        Route::get('detail/{id}', App\Http\Livewire\Landing\Menu\Detail\Index::class)->name('detail');
    });

    Route::get('cart', App\Http\Livewire\Landing\Cart\Index::class)->name('cart');

    Route::get('order', App\Http\Livewire\Landing\Order\Index::class)->name('order');

    Route::get('checkout', App\Http\Livewire\Landing\Checkout\Index::class)->name('checkout');

    Route::get('invoice', App\Http\Livewire\Landing\Invoice\Index::class)->name('invoice');
});

// STORAGE FILE ROUTE
Route::prefix('storage')->name('storage.')->namespace('App\Http\Controllers')->group(function () {
    Route::get('show/{path?}', 'FileStorage@show')->name('show');
    Route::get('download/{path?}', 'FileStorage@download')->name('download');
});

Route::prefix('base')->name('base.')->namespace('App\Http\Controllers')->group(function () {
    Route::get('config', 'BaseController@getConfig')->name('config');
});
