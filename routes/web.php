<?php

use App\Http\Controllers\PemesananController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', function () {
    return view('user.home');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pemesanan', [\App\Http\Controllers\PemesananController::class,'index']);
Route::get('pemesanan/create', [\App\Http\Controllers\PemesananController::class,'pemesanan'])->name('pemesanan');
Route::post('pemesanan', [\App\Http\Controllers\PemesananController::class,'store'])->name('pemesanan.store');
Route::get('pemesanan/success/{date}', [\App\Http\Controllers\PemesananController::class,'success'])->name('pemesanan.success');