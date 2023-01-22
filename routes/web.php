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

Route::get('/', function () {
    \Illuminate\Support\Facades\Http::post(
        'https://api.telegram.org/bot' . \App\Service\TelegramService::botToken() . '/sendMessage', [
            'chat_id' => \App\Service\TelegramService::chatId(),
            'text' => '<b>Hello bot</b>',
            'parse_mode' => 'html'
        ]
    );
});
