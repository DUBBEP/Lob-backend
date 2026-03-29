<?php

use App\Http\Controllers\GhostRecordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(GhostRecordController::class)->group(function () {
    Route::get('/GhostRecords', 'index');
    Route::get('/GhostRecords/{id}', 'show');
    Route::post('/GhostRecords', 'store');
});
