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
Route::resource('order', \App\Http\Controllers\Admin\OrderController::class);

Route::post(
    '/update_preview_image/{product}',
    [\App\Http\Controllers\Admin\ProductController::class, 'updatePreviewImage']
)->name('updatePreviewImage');
Route::post(
    '/update_product_images/{product}',
    [\App\Http\Controllers\Admin\ProductController::class, 'updateProductImages']
)->name('updateProductImages');

Route::get('/hook', \App\Http\Controllers\HookRegistrationController::class)->name('hook');
Route::get('/check_hook', \App\Http\Controllers\CheckHookController::class)->name('checkHook');
Route::post('/webhook', \App\Http\Controllers\WebHookController::class);
