<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/ships/create', [ShipController::class, 'create'])->name('ships.create');
