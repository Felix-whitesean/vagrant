<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipController;

Route::get('/', function () {
    return view('index');
})->name('ships.index');

Route::get('/ships/create', [ShipController::class, 'create'])->name('ships.create');
Route::post('/ships/create', [ShipController::class, 'store'])->name('ships.store');
