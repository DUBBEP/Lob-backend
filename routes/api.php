<?php

use App\Http\Controllers\ChatLogController;
use App\Http\Controllers\GhostRecordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(ChatLog::class)->group(function () {
    Route::get('/ChatLog', 'index');
    Route::get('/ChatLog/{id}', 'show');
    Route::post('/ChatLog', 'store');
});

Route::controller(GhostRecordController::class)->group(function () {
    Route::get('/GhostRecords', 'index');
    Route::get('/GhostRecords/{id}', 'show');
    Route::post('/GhostRecords', 'store');
});
