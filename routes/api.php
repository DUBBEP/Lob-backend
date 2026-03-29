<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityRecordController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(ActivityRecordController::class)->group(function () {
    Route::get('/ActivityRecord', 'index');
    Route::get('/ActivityRecord/{id}', 'show');
    Route::post('/ActivityRecord', 'store');
});