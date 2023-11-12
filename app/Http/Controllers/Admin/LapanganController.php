<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lapangan;
use Illuminate\Http\Request;

class LapanganController extends Controller
{
    public function index(){
        // Menampilkan daftar ganre
        $lapangan = Lapangan::all();
        return view('admin.lapangan.index', compact(['lapangan']));
    }
}
