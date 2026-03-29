<?php

use App\Http\Controllers\ChatLogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(ChatLog::class)->group(function () {
    Route::get('/ChatLog', 'index');
    Route::get('/ChatLog/{id}', 'show');
    Route::post('/ChatLog', 'store');
});
