<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JamController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('/agenda',AgendaController::class);
Route::resource('/guru',GuruController::class);
Route::resource('/jadwal',JadwalController::class);
Route::resource('/jam',JamController::class);
Route::resource('/jurusan',JurusanController::class);
Route::resource('/kehadiran',KehadiranController::class);
Route::resource('/kelas',KelasController::class);
Route::resource('/mapel',MapelController::class);
Route::resource('/siswa',SiswaController::class);