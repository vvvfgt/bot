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

Route::get('/', \App\Http\Controllers\Admin\MainController::class)->name('admin.main');

Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class);
Route::resource('tag', \App\Http\Controllers\Admin\TagController::class);
Route::resource('color', \App\Http\Controllers\Admin\ColorController::class);
Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);
Route::resource('group', \App\Http\Controllers\Admin\GroupController::class);

Route::get('/order', function (\App\Service\Telegram $telegram) {
   return view('site.order', ['orders' => \App\Models\Order::query()->active()->get()]);
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::post('/order/store', 'OrderController@store')->name('order.store');
});
