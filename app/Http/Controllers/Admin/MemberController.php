<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\member;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 5; 

        if ($request->has('search')) {
            $members = Member::where('nama', 'LIKE', '%'.$request->search.'%')->paginate($perPage);
        } else {
            $members = Member::paginate($perPage);
        }

        return view('admin.member.index', compact('members'));
    }
    public function create()
    {
        return view('admin.member.create');
    }
    public function store(Request $request)
    {
        $memberData = [
            'nama' => 'required',
            'JK' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'durasi' => 'required',
            'total_biaya' => 'required',
            'status' => 'required',
        ];

        $validatedData = $request->validate($memberData);
        $total_biaya = $request->get('total_biaya');

        $tgl_mulai = Carbon::now();

        $tgl_akhir = $tgl_mulai->copy()->addMonths($validatedData['durasi']);

        $member = Member::create($validatedData + [
            'user_id' => auth()->id(),
            'tgl_mulai' => $tgl_mulai,
            'tgl_akhir' => $tgl_akhir,
        ]);

        return redirect()->route('member.admin.index', ['id' => $member->id, 'total_biaya' => $total_biaya])
            ->with([
                'message' => 'Pendaftaran anda berhasil, Silahkan upload bukti pembayaran!',
                'alert-type' => 'success'
            ]);
    }
    public function update($id)
    {
        $member = member::find($id);
        return view('admin.member.update', compact(['member']));
    }
    public function edit($id, Request $request)
    {
        $member = member::find($id);
        $member->update($request->except(['_token', 'submit']));
        return redirect()->route('member.admin.index');
    }
    public function delete($id)
    {
        $member = member::find($id);
        $member->delete();
        session()->flash('success', 'Data berhasil dihapus.');
        return redirect()->route('member.admin.index');
    }
    public function cetak(Request $request)
    {
        $cetakData = member::all()->where('status', 'Aktif');

        return view('admin.member.cetak', compact('cetakData'));
    }
    public function nota($id)
    {
        $member = member::find($id);
        return view('admin.member.nota', compact(['member']));
    }
}
