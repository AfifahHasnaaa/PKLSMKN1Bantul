<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingPage');
})->name('landingPage');

Route::get('login', [UserController::class, 'index'])->name('login');
Route::post('login', [UserController::class, 'auth'])->name('login.prosses');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::get('faq', [UserController::class, 'faq'])->name('faq');
    Route::get('contact', [UserController::class, 'contact'])->name('contact');


    // admin
    Route::get('list-user', [AdminController::class, 'listUser'])->name('list.user');
    Route::get('tambah-user', [AdminController::class, 'tambahUser'])->name('tambah.user');
    Route::get('list-role', [AdminController::class, 'listRole'])->name('list.role');


    // siswa
    Route::get('jurnal', [SiswaController::class, 'jurnal'])->name('index.jurnal');
    route::get('laporan', [SiswaController::class, 'laporan'])->name('laporan');
});