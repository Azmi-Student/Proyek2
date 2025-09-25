<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::get('/test', function () {
    return response()->json(['message' => 'API jalan!']);
});

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);

Route::post('/users/login', [UserController::class, 'login']);