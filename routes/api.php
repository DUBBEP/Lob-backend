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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [SessionController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [SessionController::class, 'destroy']);
    Route::post('/GhostRecords', [GhostRecordController::class, 'store']);
    Route::post('/PlayerRecords', [PlayerRecordController::class, 'store']);
    Route::post('/ActivityRecord', [ActivityRecordController::class, 'store']);
    Route::post('/ChatLog', [ChatLogController::class], 'store');
});

Route::controller(PlayerRecordController::class)->group(function () {
    Route::get('/PlayerRecords', 'index');
    Route::get('/PlayerRecords/{playerRecord}', 'show');
});

Route::controller(ActivityRecordController::class)->group(function () {
    Route::get('/ActivityRecord', 'index');
    Route::get('/ActivityRecord/recent', 'recent');
    Route::get('/ActivityRecord/{activityRecord}', 'show');
});

Route::controller(ChatLogController::class)->group(function () {
    Route::get('/ChatLog', 'index');
    Route::get('/ChatLog/{chatLog}', 'show');
});

Route::get('/GhostRecords', [GhostRecordController::class, 'index']);
Route::get('/GhostRecords/{ghostRecord}', [GhostRecordController::class, 'show']);
