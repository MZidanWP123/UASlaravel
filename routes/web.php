<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsensiController;

//Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/web/login', [AuthController::class, 'login']);
Route::post('/web/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/absensis', [AbsensiController::class, 'index']);
    Route::post('/absensis', [AbsensiController::class, 'store']);
    Route::get('/absensis/{id}', [AbsensiController::class, 'show']);
    Route::put('/absensis/{id}', [AbsensiController::class, 'update']);
    Route::delete('/absensis/{id}', [AbsensiController::class, 'destroy']);
});



// Route::get('/', function () {
//     return view('index', ['judul' => 'About Us']);
// });

//Route::post('/users/store', [UserController::class, 'store']);

// Route::get('/main', function () {
//     return view('main', ['judul' => 'Main Page']);
// });

// Route::get('/settings', function () {
//     return view('settings', ['judul' => 'Settings']);
// });

// Route::get('/posts', function () {
//     // dd(request(['search']));
//     return view('posts', ['judul' => 'Blog Page', 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(5)->withQueryString()]);    
// });