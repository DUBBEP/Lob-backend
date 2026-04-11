<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\PlayerRecordController;
use App\Http\Controllers\ActivityRecordController;
use App\Http\Controllers\ChatLogController;
use App\Http\Controllers\GhostRecordController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [SessionController::class, 'store']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [SessionController::class, 'destroy']);
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

Route::controller(ChatLogController::class)->group(function () {
    Route::get('/ChatLog', 'index');
    Route::get('/ChatLog/{id}', 'show');
    Route::post('/ChatLog', 'store');
});

Route::controller(GhostRecordController::class)->group(function () {
    Route::get('/GhostRecords', 'index');
    Route::get('/GhostRecords/{id}', 'show');
    Route::post('/GhostRecords', 'store');
});
