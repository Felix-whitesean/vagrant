<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipController;
use \App\Http\Controllers\auth\AuthController;

Route::middleware(['check.session'])->group(function () {
    Route::get('/', [ShipController::class, 'index'])->name('ships.index');
});

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

Route::get('/clients', [ClientController::class, ''])->name('clients.index');

Route::get('/ports/create', [PortController::class, 'create'])->name('ports.create');
Route::post('/ports/create', [PortController::class, 'store'])->name('ports.store');
Route::get('/ports/edit/{id}', [PortController::class, 'edit'])->name('ports.edit');
Route::post('/ports/edit/', [PortController::class, 'update'])->name('ports.update');


Route::get('/ships/create', [ShipController::class, 'create'])->name('ships.create');
Route::post('/ships/create', [ShipController::class, 'store'])->name('ships.store');

Route::get('/crew/create', [CrewController::class, 'create'])->name('crew.create');
Route::post('/crew/create', [CrewController::class, 'store'])->name('crew.store');

Route::get('/cargo/create', [CargoController::class, 'create'])->name('cargo.create');
Route::post('/cargo/create', [CargoController::class, 'store'])->name('cargo.store');

Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients/create', [ClientController::class, 'store'])->name('clients.store');

Route::get('/shipments/create', [ShipmentController::class, 'create'])->name('shipments.create');
Route::post('/shipments/create', [ShipmentController::class, 'store'])->name('shipments.store');
