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
Route::get('/', function () {
    return view('user.home');
});

Auth::routes();

Route::get('/pemesanan', [\App\Http\Controllers\PemesananController::class,'index']);
Route::get('pemesanan/create', [\App\Http\Controllers\PemesananController::class,'pemesanan'])->name('pemesanan')->middleware('auth');
Route::post('pemesanan', [\App\Http\Controllers\PemesananController::class,'store'])->name('pemesanan.store');
Route::get('/pemesanan/{id}', [\App\Http\Controllers\PemesananController::class, 'success'])->name('pemesanan.success');

Route::get('/kursus', [\App\Http\Controllers\KursusController::class, 'index']);
Route::get('kursus/create', [\App\Http\Controllers\KursusController::class, 'create'])->name('kursus');
Route::get('kursus/success', [\App\Http\Controllers\KursusController::class,'success'])->name('kursus.success');
Route::post('/kursus/store', [\App\Http\Controllers\KursusController::class, 'store'])->name('kursus.store');

Route::get('/member', [\App\Http\Controllers\MemberController::class, 'index']);
Route::get('member/create', [\App\Http\Controllers\MemberController::class, 'create'])->name('member');
Route::post('/member/store', [\App\Http\Controllers\MemberController::class, 'store']);
Route::get('/member/{id}', [\App\Http\Controllers\MemberController::class, 'success'])->name('member.success');

Route::get('/about', function () {
    return view('user.about');
});

Route::get('/tampilan', function () {
    return view('admin.dashboard');
});

Route::get('/lapangan', [\App\Http\Controllers\Admin\LapanganController::class, 'index']);

