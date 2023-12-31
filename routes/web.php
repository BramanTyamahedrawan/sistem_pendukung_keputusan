<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\StudiKasusController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\MatriksKeputusanController;
use App\Http\Controllers\NormalisasiMatrikController;
use App\Http\Controllers\MatriksTertimbangController;
use App\Http\Controllers\MatriksAreaController;
use App\Http\Controllers\MatriksJarakController;
use App\Http\Controllers\MatriksPerangkinganController;
use App\Http\Controllers\JurnalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
});

Route::resource('kriteria', KriteriaController::class);
Route::resource('alternatif', AlternatifController::class);
Route::resource('studi-kasus', StudiKasusController::class);
Route::resource('matriks_keputusan', MatriksKeputusanController::class);
Route::resource('normalisasi_matriks', NormalisasiMatrikController::class);
Route::resource('matriks_tertimbang', MatriksTertimbangController::class);
Route::resource('matriks_area', MatriksAreaController::class);
Route::resource('matriks_jarak', MatriksJarakController::class);
Route::resource('matriks_perangkingan', MatriksPerangkinganController::class);
Route::get('studi-kasus/{id}/alternatif', [StudiKasusController::class, 'showAlternatif'])->name('studi-kasus.alternatif');
Route::get('studi-kasus/{id}/kriteria', [StudiKasusController::class, 'showKriteria'])->name('studi-kasus.kriteria');
Route::post('/tambah-alternatif', [AlternatifController::class, 'tambahAlternatif'])->name('tambah.alternatif');
Route::post('/tambah-kriteria', [KriteriaController::class, 'tambahKriteria'])->name('tambah.kriteria');
Route::post('/edit-alternatif', [AlternatifController::class, 'editAlternatif'])->name('edit.alternatif');
Route::get('/get-alternatif/{id}', [AlternatifController::class, 'getAlternatif'])->name('get.alternatif');
Route::get('/get-kriteria/{id}', [KriteriaController::class, 'getKriteria'])->name('get.kriteria');
Route::post('/edit-kriteria', [KriteriaController::class, 'editKriteria'])->name('edit.kriteria');
Route::delete('/delete-alternatif/{id}', [AlternatifController::class, 'destroyAlternatif'])->name('delete.alternatif');
Route::delete('/delete-kriteria/{id}', [KriteriaController::class, 'destroyKriteria'])->name('delete.kriteria');
Route::get('/jurnal', [JurnalController::class, 'index'])->name('jurnal.index');
