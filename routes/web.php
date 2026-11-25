<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Mews\Captcha\Facades\Captcha;

// Rute otomatis untuk gambar captcha mews/captcha
Route::get('/flat/captcha/{config?}', function ($config = 'flat') {
    return Captcha::create($config);
});

Route::redirect('/', '/login');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});