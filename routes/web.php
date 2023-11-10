<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\PemesananController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\returnSelf;

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
Route::get('pemesanan/create', [\App\Http\Controllers\PemesananController::class,'pemesanan'])->name('pemesanan')->middleware('auth');
Route::post('pemesanan', [\App\Http\Controllers\PemesananController::class,'store'])->name('pemesanan.store');
Route::get('pemesanan/success/{date}', [\App\Http\Controllers\PemesananController::class,'success'])->name('pemesanan.success');

Route::get('/kursus', function(){
    return view('user.kursus.index');
});
Route::get('kursus/create', [\App\Http\Controllers\KursusController::class, 'create'])->name('kursus');
Route::post('/kursus/store', [\App\Http\Controllers\KursusController::class, 'store'])->name('kursus.store');

Route::get('/member', function(){
    return view('user.member.index');
});
Route::get('member/create', [\App\Http\Controllers\MemberController::class, 'create'])->name('member');

Route::post('/member/store', [MemberController::class, 'store']);