<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;

Auth::routes();

Route::get('/', [HomeController::class, 'index']);

Route::group(['middleware' => ['auth']], function ()
{
    Route::get('chat/chat',      [MessageController::class, 'index']);
    Route::get('messages',       [MessageController::class, 'get']);
    Route::post('messages',      [MessageController::class, 'send']);
});
