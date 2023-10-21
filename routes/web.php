<?php

use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/{id}/edit', [PendudukController::class, 'edit']);
Route::delete('/delete/{id}', [PendudukController::class, 'destroy']);
Route::get('/export', [PendudukController::class, 'exportPenduduk']);
Route::get('/create/get-kabupaten/{provinsi_id}', [PendudukController::class, 'getKabupaten']);
Route::resource('/', PendudukController::class);

Route::resource('/provinsi', ProvinsiController::class);

Route::resource('/kabupaten', KabupatenController::class);

//Route Download
Route::get('/exportpdf',[ExportController::class, 'penduduk']);


