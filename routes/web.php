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
    });
});
