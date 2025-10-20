<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipController;
use \App\Http\Controllers\auth\AuthController;

Route::middleware(['check.session'])->group(function () {
    Route::get('/', [ShipController::class, 'index']);
})->name('ships.index');

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

Route::get('/ships/create', [ShipController::class, 'create'])->name('ships.create');
Route::post('/ships/create', [ShipController::class, 'store'])->name('ships.store');
