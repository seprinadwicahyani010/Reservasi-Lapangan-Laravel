<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LapanganController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $lapangan = Lapangan::where('nama_lapangan', 'LIKE', '%'.$request->search.'%')->paginate(5);
        } else {
            $lapangan = Lapangan::all();
        }
        return view('admin.lapangan.index', compact(['lapangan']));
    }
    public function create()
    {
        return view('admin.lapangan.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_lapangan' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $gambar_file = $request->file('gambar');
        $gambar_nama = time() . '_' . $gambar_file->getClientOriginalName();
        $gambar_file->move(public_path('Gambar Lapangan'), $gambar_nama);
        $data['gambar'] = $gambar_nama;

        $newLapangan = Lapangan::create($data);

        return redirect('/lapangan')->with('success', 'Lapangan berhasil ditambahkan');
    }
    public function update($id)
    {
        $lapangan = Lapangan::find($id);
        return view('admin.lapangan.update', compact(['lapangan']));
    }
    public function edit($id, Request $request)
    {
        $lapangan = Lapangan::find($id);
        $data = $request->validate([
            'nama_lapangan' => 'required',
            'harga' => 'required|numeric'
        ]);

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => '|image|mimes:jpeg,jpg,png'
            ]);
            $gambar_file = $request->file('gambar');
            $gambar_nama = time() . '_' . $gambar_file->getClientOriginalName();
            $gambar_file->move(public_path('Gambar Lapangan'), $gambar_nama);

            $namaGambar = $lapangan->gambar;
            $pathGambar = public_path('Gambar Lapangan/') . $namaGambar;
            if (file_exists($pathGambar)) {
                unlink($pathGambar);
            }
            $data['gambar'] = $gambar_nama;

            $lapangan->update($data);
            
            return redirect('/lapangan')->with('success', 'Lapangan berhasil diperbarui');
        }
    }

    public function delete($id)
    {
        $lapangan = Lapangan::find($id);

        $namaGambar = $lapangan->gambar;

        $pathGambar = public_path('Gambar Lapangan/') . $namaGambar;
        if (file_exists($pathGambar)) {
            unlink($pathGambar);
        }
        $lapangan->delete();
        return redirect('/lapangan');
    }
}
