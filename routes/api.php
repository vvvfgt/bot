<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\IndexController;
use App\Http\Controllers\API\FilterController;
use App\Http\Controllers\API\ShowController;
use App\Http\Controllers\API\ShopController;

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

Route::post('/orders', OrderController::class);
Route::post('/products', IndexController::class);
Route::get('products/filters', FilterController::class);
Route::get('/products/{product}', ShowController::class);
Route::get('/categories/{id}', [ShopController::class, 'getCategories']);
Route::get('/random-products', [ShopController::class, 'getRandomProduct']);
Route::get('/category-products/{category}', [ShopController::class, 'getCategoryProducts']);
Route::get('/groups', [ShopController::class, 'getGroups']);
