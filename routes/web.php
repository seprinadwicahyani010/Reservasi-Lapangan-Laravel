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

Route::middleware(['guest'])->group(function () {

});

Route::middleware('role:admin')->group(function () {
    //semua route untuk admin disini

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::resource('/lapangan', LapanganController::class)->except([
        'edit', 'update', 'destroy'
    ]);
    Route::resource('/pelatih', PelatihController::class)->except([
        'edit', 'update', 'destroy'
    ]);
    Route::resource('/member', MemberController::class)->except([
        'edit', 'update', 'destroy'
    ]);
    Route::resource('/kursus', KursusController::class)->except([
        'edit', 'update', 'destroy'
    ]);
    Route::resource('/pemesanan', PemesananController::class)->except([
        'edit', 'update', 'destroy'
    ]);
});

Route::resource('/pemesanan', PemesananController::class)->only([
    'index', 'create', 'store', 'show'
])->middleware('auth');

Route::get('/pemesanan/{id}/success', [PemesananController::class, 'success'])->name('pemesanan.success');

Route::resource('/kursus', KursusController::class)->only([
    'index', 'create', 'store'
]);

Route::get('/kursus/success', [KursusController::class, 'success'])->name('kursus.success');

Route::resource('/member', MemberController::class)->only([
    'index', 'create', 'store', 'show'
]);

Route::get('/member/{id}/success', [MemberController::class, 'success'])->name('member.success');

Route::get('/about', function () {
    return view('user.about');
});


