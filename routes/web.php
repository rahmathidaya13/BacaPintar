<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\NotFoundController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PengembalianController;

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

Auth::routes();

// Route::get('/', function () {
//     return view('login');
// });
Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resources([
        'books' => BukuController::class,
        'category' => KategoriController::class,
        'peminjaman' => PeminjamanController::class,
        'pengembalian' => PengembalianController::class,
        'reservasi' => ReservationController::class,
        'ulasan' => UlasanController::class,
    ]);
});

Route::get('/404', [NotFoundController::class, 'index'])->name('404')->middleware('role:user');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
