<?php

use App\Http\Controllers\PlayerRecordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityRecordController;
use App\Http\Controllers\ChatLogController;
use App\Http\Controllers\GhostRecordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(PlayerRecordController::class)->group(function () {
    Route::get('/PlayerRecords', 'index');
    Route::get('/PlayerRecords/{id}', 'show');
    Route::post('/PlayerRecords', 'store');
});
Route::controller(ActivityRecordController::class)->group(function () {
    Route::get('/ActivityRecord', 'index');
    Route::get('/ActivityRecord/{id}', 'show');
    Route::post('/ActivityRecord', 'store');
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
