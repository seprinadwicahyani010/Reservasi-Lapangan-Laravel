<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LapanganController extends Controller
{
    public function index(){
        $lapangan = Lapangan::all();
        return view('admin.lapangan.index', compact(['lapangan']));
    }
    public function create(){
        return view('admin.lapangan.create');
    }
    public function store(Request $request)
    {
        // Validasi form jika diperlukan
        $request->validate([
            'nama_lapangan' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Sesuaikan dengan kebutuhan validasi lainnya
        ]);

        // Simpan data lapangan
        $lapangan = new Lapangan([
            'nama_lapangan' => $request->input('nama_lapangan'),
            'harga' => $request->input('harga'),
        ]);

        // Simpan gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarNama = time() . '_' . $gambar->getClientOriginalName();
            $gambar->storeAs('public/gambar', $gambarNama);
            $lapangan->gambar = $gambarNama;
        }
        

        $lapangan->save();

        // Redirect ke halaman index atau halaman lainnya
        return redirect('/lapangan')->with('success', 'Lapangan berhasil ditambahkan');
    }
    public function update($id){
        $lapangan = Lapangan::find($id);
        return view('admin.lapangan.update', compact(['lapangan']));
    }
    public function edit($id, Request $request){
        // Validasi form jika diperlukan
        $request->validate([
            'nama_lapangan' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // Sesuaikan dengan kebutuhan validasi lainnya
        ]);
    
        // Cari data lapangan berdasarkan ID
        $lapangan = Lapangan::find($id);
    
        // Update data lapangan
        $lapangan->update([
            'nama_lapangan' => $request->input('nama_lapangan'),
            'harga' => $request->input('harga'),
        ]);
    
        // Update gambar jika ada
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarNama = time() . '_' . $gambar->getClientOriginalName();
            $gambar->storeAs('public/gambar', $gambarNama);
    
            // Hapus gambar lama jika ada
            if ($lapangan->gambar) {
                Storage::delete('public/gambar/' . $lapangan->gambar);
            }
    
            $lapangan->gambar = $gambarNama;
        }
    
        $lapangan->save();
    
        // Redirect ke halaman index atau halaman lainnya
        return redirect('/lapangan')->with('success', 'Lapangan berhasil diperbarui');
    }
    public function delete($id){
        $lapangan = Lapangan::find($id);
        $lapangan->delete();
        return redirect('/lapangan');
    }
}
