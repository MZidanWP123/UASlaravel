<?php

use App\Http\Controllers\WebView\MasterKelasController;
use Illuminate\Support\Facades\Route;



Route::get('/master/kelas', [MasterKelasController::class, 'index'])->name('master-kelas.index');
Route::get('/master/kelas/add', [MasterKelasController::class, 'add'])->name('master-kelas.add');
Route::post('/master/kelas/store', [MasterKelasController::class, 'store'])->name('master-kelas.store');
Route::get('/master/kelas/view/{id}', [MasterKelasController::class, 'view'])->name('master-kelas.view');
Route::put('/master/kelas/update/{id}', [MasterKelasController::class, 'update'])->name('master-kelas.update');
Route::get('/master/kelas/delete/{id}', [MasterKelasController::class, 'delete'])->name('master-kelas.delete');