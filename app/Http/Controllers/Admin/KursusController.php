<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kursus;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 5; 

        if ($request->has('search')) {
            $kursus = Kursus::where('nama', 'LIKE', '%'.$request->search.'%')->paginate($perPage);
        } else {
            $kursus = Kursus::paginate($perPage);
        }

        return view('admin.kursus.index', compact('kursus'));
    }
    public function create(){
        return view('admin.kursus.create');
    }
    public function store(Request $request)
    {
        $kursusData = [
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'umur' => 'required',
            'JK' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'status' => 'required'
        ];

        $validatedData = $request->validate($kursusData);

        $kursus = Kursus::create($validatedData);

        return redirect()->route('kursus.admin.index')
        ->with([
            'message' => 'Pendaftaran anda berhasil, Silahkan upload bukti pembayaran!',
            'alert-type' => 'success'
        ]);
    }
    public function update($id){
        $kursus = Kursus::find($id);
        return view('admin.kursus.update', compact(['kursus']));
    }
    public function edit($id, Request $request){
        $kursus = Kursus::find($id);
        $kursus->update($request->except(['_token', 'submit']));
        return redirect()->route('kursus.admin.index');
    }
    public function delete($id){
        $kursus = Kursus::find($id);
        $kursus->delete();
        return redirect()->route('kursus.admin.index');
    }
    
    public function cetak(Request $request)
    {
        $cetakData = Kursus::all()->where('status', 'Aktif');

        return view('admin.kursus.cetak', compact('cetakData'));
    }
}
