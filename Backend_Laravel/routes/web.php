<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\NilaiController;
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
    Route::get('list-siswa', [AdminController::class, 'listSiswa'])->name('list.siswa');
    Route::get('list-guru', [AdminController::class, 'listGuru'])->name('list.guru');
    Route::get('tambah-user', [AdminController::class, 'tambahUser'])->name('tambah.user');
    Route::post('user-store', [AdminController::class, 'store'])->name('user.store');
    Route::get('/users/edit/{id}', [AdminController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{id}', [AdminController::class, 'update'])->name('users.update');
    Route::delete('/users/delete/{id}', [AdminController::class, 'destroy'])->name('users.destroy');
    Route::get('list-role', [AdminController::class, 'listRole'])->name('list.role');
    //admin-get-data
    Route::get('data-siswa', [AdminController::class, 'dataSiswa'])->name('data.siswa');
    Route::get('data-guru', [AdminController::class, 'dataGuru'])->name('data.guru');
    Route::get('data-pembimbing-instansi', [AdminController::class, 'dataInstansi'])->name('data.pembimbing.instansi');
    Route::get('data-instansi', [InstansiController::class, 'dataInstansi'])->name('data.instansi');

    //instansi
    Route::get('list-pembimbing-instansi', [AdminController::class, 'listPembimbingInstansi'])->name('list.pembimbing.instansi');
    Route::get('list-instansi', [InstansiController::class, 'index'])->name('list.instansi');
    Route::get('tambah-instansi', [InstansiController::class, 'create'])->name('tambah.instansi');
    Route::post('instansi-store', [InstansiController::class, 'store'])->name('instansi.store');
    Route::get('edit-instansi/{id}', [InstansiController::class, 'edit'])->name('edit.instansi');
    Route::put('update-instansi/{id}', [InstansiController::class, 'update'])->name('instansi.update');
    Route::delete('delete-instansi/{id}', [InstansiController::class, 'destroy'])->name('delete.instansi');
    // siswa
    Route::get('jurnal', [SiswaController::class, 'jurnal'])->name('index.jurnal');
    Route::get('laporan/{id}', [SiswaController::class, 'laporan'])->name('laporan');

    //Guru dan Instansi
    Route::get('semua-siswa', [JurnalController::class, 'semuaSiswa'])->name('semua.siswa');
    Route::get('data-semua-siswa', [JurnalController::class, 'dataSemuaSiswa'])->name('data.semua.siswa');
    Route::get('/buat-jurnal/{id}', [JurnalController::class, 'create'])->name('buat.jurnal');
    Route::post('store-jurnal', [JurnalController::class, 'store'])->name('store.jurnal');
    Route::get('/edit-jurnal/{id}', [JurnalController::class, 'edit'])->name('edit.jurnal');
    Route::put('update-jurnal/{id}', [JurnalController::class, 'update'])->name('update.jurnal');
    Route::delete('delete-jurnal/{id}', [JurnalController::class, 'destroy'])->name('delete.jurnal');

    //indikator jurnal
    Route::get('/jurnal-siswa/{id}', [IndikatorController::class, 'index'])->name('show.jurnal');
    Route::get('data-indikator/{id}', [IndikatorController::class, 'dataIndikator'])->name('indikator.data');
    Route::get('/edit-indikator/{id}', [IndikatorController::class, 'edit'])->name('indikator.edit');
    Route::get('/skor-indikator/{id}', [IndikatorController::class, 'skor'])->name('indikator.skor');
    Route::get('/tambah-indikator/{id}', [IndikatorController::class, 'create'])->name('indikator.tambah');
    Route::post('store-indikator/{id}', [IndikatorController::class, 'store'])->name('indikator.store');
    Route::put('update-skor-indikator/{id}', [IndikatorController::class, 'updateSkor'])->name('indikator.update.skor');
    Route::put('update-indikator/{id}', [IndikatorController::class, 'update'])->name('indikator.update');
    Route::delete('delete-indikator/{id}', [IndikatorController::class, 'destroy'])->name('indikator.destroy');

    //isi jurnal harian
    Route::get('/isi-indikator/{id}', [IndikatorController::class, 'isiCreate'])->name('indikator.isi.create');
    Route::put('update-isi-indikator/{id}', [IndikatorController::class, 'isiUpdate'])->name('indikator.isi.update');

    //input nilai laporan dan presentasi
    Route::get('/nilai-input/{id}', [NilaiController::class, 'create'])->name('nilai.input');
    Route::post('/nilai-store/{id}', [NilaiController::class, 'store'])->name('nilai.store');

    //profile
    Route::post('profile-akun/{id}', [UserController::class, 'profileAkun'])->name('profile.akun');
    Route::post('profile-password/{id}', [UserController::class, 'profilePassword'])->name('profile.password');

    Route::get('/chart-data', [UserController::class, 'getChartData']);
    Route::get('/jurnal/export/{id}', [JurnalController::class, 'exportExcel'])->name('jurnal.export');
    Route::post('users/import', [UserController::class, 'importUsers'])->name('users.import');
});
