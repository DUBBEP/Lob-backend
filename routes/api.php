<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [SessionController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [SessionController::class, 'destroy']);
});