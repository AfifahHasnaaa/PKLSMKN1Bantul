<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingPage');
});

Route::get('login', [UserController::class, 'index'])->name('login');
Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
