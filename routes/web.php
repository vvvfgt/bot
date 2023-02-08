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

Route::get('/', function (\App\Service\Telegram $telegram) {
   return view('site.order', ['orders' => \App\Models\Order::query()->active()->get()]);
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::post('/order/store', 'OrderController@store')->name('order.store');
});
