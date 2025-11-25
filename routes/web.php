<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GraficController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('Home');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.perform');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout.perform');

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('products', ProductController::class);
    Route::get('products/pdf/{id}', [ProductController::class, 'pdf'])->name('pdf');
    Route::resource('movements', MovementController::class);
    Route::resource('grafics', GraficController::class);
});
