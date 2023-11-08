<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    public function create(){
        return view('user.kursus.create');
    }
    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'JK' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);
        $kursus = new Kursus;
        $kursus->nama = $request->input('nama');
        $kursus->umur = $request->input('umur');
        $kursus->JK = $request->input('JK');
        $kursus->alamat = $request->input('alamat');
        $kursus->no_hp = $request->input('no_hp');
        $kursus->save();
        return redirect('/kursus');
    }
}
