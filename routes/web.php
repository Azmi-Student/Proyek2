<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\NutrisiController;

Route::get('/', function () {
    return view('main');
})->middleware('auth');


Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);

Route::get('/kalender-kehamilan', function () {
    return view('fitur.kalender-kehamilan');
})->middleware('auth');
Route::get('/reservasi-dokter', function () {
    return view('fitur.reservasi-dokter');
})->middleware('auth');

Route::get('/api/nutrisi', [NutrisiController::class, 'getNutrisi']);
