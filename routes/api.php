<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\GuruLevelController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\MuridController;
use App\Models\GuruLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::post('/users/store', [UserController::class, 'store']);
//Route::get('/users/index', [UserController::class, 'index']);

Route::get('/gurus', [GuruController::class, 'index']);
Route::post('/gurus/store', [GuruController::class, 'store']);
Route::put('/gurus/{id}', [GuruController::class, 'update']);
Route::delete('/gurus/{id}', [GuruController::class, 'destroy']);
Route::get('/gurus/{id}', [GuruController::class, 'show']);

Route::get('/levels', [LevelController::class, 'index']);
Route::post('/levels/store',[LevelController::class, 'store']);
Route::put('/levels/{id}',[LevelController::class, 'update']);
Route::delete('/levels/{id}',[LevelController::class, 'destroy']);
Route::get('/levels/{id}',[LevelController::class, 'show']);

Route::get('/jadwals', [JadwalController::class, 'index']);
Route::post('/jadwals/store', [JadwalController::class, 'store']);
Route::put('/jadwals/{id}', [JadwalController::class, 'update']);
Route::delete('/jadwals/{id}', [JadwalController::class, 'destroy']);
Route::get('/jadwals/{id}', [JadwalController::class, 'show']);

Route::get('/kelas', [KelasController::class, 'index']);
Route::post('/kelas/store', [KelasController::class, 'store']);
Route::put('/kelas/{id}', [KelasController::class, 'update']);
Route::delete('/kelas/{id}', [KelasController::class, 'destroy']);
Route::get('/kelas/{id}', [KelasController::class, 'show']);

Route::get('/murids', [MuridController::class, 'index']);
Route::post('/murids/store', [MuridController::class, 'store']);
Route::put('/murids/{id}', [MuridController::class, 'update']);
Route::delete('/murids/{id}', [MuridController::class, 'destroy']);
Route::get('/murids/{id}', [MuridController::class, 'show']);

// Route::middleware(['web', 'auth'])->group(function () {
//     Route::get('/absensi', [AbsensiController::class, 'index']);
//     Route::post('/absensi', [AbsensiController::class, 'store']);
//     Route::get('/absensi/{id}', [AbsensiController::class, 'show']);
//     Route::put('/absensi/{id}', [AbsensiController::class, 'update']);
//     Route::delete('/absensi/{id}', [AbsensiController::class, 'destroy']);
// });

Route::get('/guru_levels', [GuruLevelController::class, 'index']);
Route::post('/guru_levels/store', [GuruLevelController::class, 'store']);
Route::put('/guru_levels/{id}', [GuruLevelController::class, 'update']);
Route::delete('/guru_levels/{id}', [GuruLevelController::class, 'destroy']);
Route::get('/guru_levels/{id}', [GuruLevelController::class, 'show']);