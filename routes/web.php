<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\StudiKasusController;
use App\Http\Controllers\AlternatifController;

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
Route::get('studi-kasus/{id}/alternatif', [StudiKasusController::class, 'showAlternatif'])->name('studi-kasus.alternatif');
Route::post('/tambah-alternatif', [AlternatifController::class, 'tambahAlternatif'])->name('tambah.alternatif');
