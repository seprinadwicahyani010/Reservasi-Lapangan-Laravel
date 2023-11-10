<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KursusController extends Controller
{
    public function create(){
        if (!Auth::check()) {
            return redirect()->route('login')->with('warning', 'Anda harus login untuk melakukan reservasi.');
        }
        return view('user.kursus.create');
    }
    public function store(Request $request){
        $kursusData = [
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'umur' => 'required',
            'JK' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ];
        $validatedData = $request->validate($kursusData);

        // Menyimpan data member ke dalam database
        Kursus::create($validatedData + [
            'status' => $request->filled('status') ? $request->input('status') : "Menunggu Verifikasi"
        ]);
        return redirect('/kursus');
    }
}
