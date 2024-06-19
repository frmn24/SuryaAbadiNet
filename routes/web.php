<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route default
Route::get('/', function () {
    return view('welcome');
});

// Route untuk otentikasi
Auth::routes();

// Route untuk dashboard
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth');

// Route pengguna
Route::middleware(['auth'])->group(function() {
    Route::get('/pengguna', [\App\Http\Controllers\PenggunaController::class, 'index']);
    Route::post('/pengguna', [\App\Http\Controllers\PenggunaController::class, 'store']);
    Route::get('/pengguna/create', [\App\Http\Controllers\PenggunaController::class, 'create']);
    Route::get('/pengguna/{id}/edit', [\App\Http\Controllers\PenggunaController::class, 'edit']);
    Route::put('/pengguna/{id}', [\App\Http\Controllers\PenggunaController::class, 'update']);
    Route::delete('/pengguna/{id}', [\App\Http\Controllers\PenggunaController::class, 'destroy']);

    // Route datapaket
    Route::get('/datapaket', [\App\Http\Controllers\DatapaketController::class, 'index']);
    Route::post('/datapaket', [\App\Http\Controllers\DatapaketController::class, 'store']);
    Route::get('/datapaket/create', [\App\Http\Controllers\DatapaketController::class, 'create']);
    Route::get('/datapaket/{id}/edit', [\App\Http\Controllers\DatapaketController::class, 'edit']);
    Route::put('/datapaket/{id}', [\App\Http\Controllers\DatapaketController::class, 'update']);
    Route::delete('/datapaket/{id}', [\App\Http\Controllers\DatapaketController::class, 'destroy']);

    // Route transaksi
    Route::get('/transaksi', [\App\Http\Controllers\TransaksiController::class, 'index']);
    Route::get('/bayar/{id_tagihan}', [App\Http\Controllers\TransaksiController::class, 'bayar'])->name('bayar');

    // Route kas
    Route::get('/kas', [\App\Http\Controllers\KasController::class, 'index']);
    Route::get('/kas/create', [\App\Http\Controllers\KasController::class, 'create']);
});

// Route untuk home
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login'); // Redirect ke halaman login setelah logout
})->name('logout');
