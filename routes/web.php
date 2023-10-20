<?php

use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\PendudukController;
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

Route::get('/create/get-kabupaten/{provinsi_id}', [PendudukController::class, 'get-kabupaten'])->middleware('csp');
Route::resource('/', PendudukController::class);

Route::resource('/provinsi', ProvinsiController::class);

Route::resource('/kabupaten', KabupatenController::class);


