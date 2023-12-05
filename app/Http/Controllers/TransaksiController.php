<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use App\Models\member;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function userReservasi()
    {
        $user = auth()->user();
        $reservasi = Pemesanan::with('lapangan')->where('user_id', $user->id)->get();
        $member = member::where('user_id', $user->id)->get();
        return view('user.transaksi.index', compact('reservasi', 'member'));
    }
    public function nota($id)
    {
        $lapangan = Lapangan::all();
        $pemesanan = Pemesanan::find($id);
        return view('admin.pemesanan.nota', compact(['pemesanan', 'lapangan']));
    }
}
