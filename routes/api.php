<?php

use App\Http\Controllers\GhostRecordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(GhostRecordController::class)->group(function () {
    Route::get('/GameObjects', 'index');
    Route::get('/GameObjects/{id}', 'show');
    Route::post('/GameObjects', 'store');
});
