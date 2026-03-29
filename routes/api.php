<?php

use App\Http\Controllers\PlayerRecordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(PlayerRecordController::class)->group(function () {
    Route::get('/PlayerRecords', 'index');
    Route::get('/PlayerRecords/{id}', 'show');
    Route::post('/PlayerRecords', 'store');
});