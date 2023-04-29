<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/orders', \App\Http\Controllers\API\OrderController::class);
Route::post('/products', \App\Http\Controllers\API\IndexController::class);
Route::get('products/filters', \App\Http\Controllers\API\FilterController::class);
Route::get('/products/{product}', \App\Http\Controllers\API\ShowController::class);
