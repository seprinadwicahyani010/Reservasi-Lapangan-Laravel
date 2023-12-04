<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PemesananRequest;
use App\Models\Lapangan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class PemesananController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 5; // Number of items per page

        if ($request->has('search')) {
            $pemesanan = Pemesanan::with('lapangan')
                ->where('nama', 'LIKE', $request->search . '%')
                ->paginate($perPage);
            $pemesanan->appends(['search' => $request->search]); // Preserve the search parameter in pagination links
        } else {
            $pemesanan = Pemesanan::with('lapangan')->paginate($perPage);
        }

        return view('admin.pemesanan.index', compact('pemesanan'));
    }


    public function create(Request $request)
    {
        $lapangan = Lapangan::all();
        $nama_lapangan = $request->get('nama_lapangan');

        return view('admin.pemesanan.create', compact('lapangan', 'nama_lapangan'));
    }
    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nama' => 'required|string',
            'lapangan_id' => 'required|exists:lapangans,id',
            'no_hp' => 'required|string',
            'waktu_mulai' => 'required|date',
            'waktu_akhir' => 'required|date|after:waktu_mulai',
            'total_harga' => 'required|numeric',
            'status' => 'required|string',
        ]);

        // Membuat instansiasi Pemesanan berdasarkan input formulir
        $pemesanan = new Pemesanan([
            'nama' => $request->input('nama'),
            'lapangan_id' => $request->input('lapangan_id'),
            'no_hp' => $request->input('no_hp'),
            'waktu_mulai' => $request->input('waktu_mulai'),
            'waktu_akhir' => $request->input('waktu_akhir'),
            'total_harga' => $request->input('total_harga'),
            'status' => $request->input('status'),
            'user_id' => auth()->user()->id,
            'tgl_pemesanan' => now()
        ]);

        // Simpan data pemesanan
        $pemesanan->save();

        // Redirect atau berikan respons sesuai kebutuhan Anda
        return redirect()->route('pemesanan.admin.index')->with('success', 'Pemesanan berhasil ditambahkan!');
    }
    public function update($id)
    {
        $lapangan = Lapangan::all();
        $pemesanan = Pemesanan::find($id);
        return view('admin.pemesanan.update', compact(['pemesanan', 'lapangan']));
    }
    public function edit($id, Request $request)
    {
        $pemesanan = Pemesanan::find($id);
        $pemesanan->update($request->except(['_token', 'submit', 'tgl_pemesanan']));
        return redirect()->route('pemesanan.admin.index');
    }
    public function delete($id)
    {
        $pemesanan = Pemesanan::find($id);
        $pemesanan->delete();
        return redirect()->route('pemesanan.admin.index');
    }
    public function cetak(Request $request)
    {
        // Validate the input data
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Get the start and end dates from the request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Fetch records within the specified date range
        $cetakPemesanan = Pemesanan::whereBetween('tgl_pemesanan', [$startDate, $endDate])
            ->where('status', 'sukses')
            ->get();

        return view('admin.pemesanan.cetak', compact('cetakPemesanan', 'startDate', 'endDate'));
    }
    public function nota($id)
    {
        $lapangan = Lapangan::all();
        $pemesanan = Pemesanan::find($id);
        return view('admin.pemesanan.nota', compact(['pemesanan', 'lapangan']));
    }
}
