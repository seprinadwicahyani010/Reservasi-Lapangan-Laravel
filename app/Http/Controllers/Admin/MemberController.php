<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request){
            $perPage = 5; // Jumlah item per halaman
        
            if ($request->has('search')) {
                $members = Member::where('nama', 'LIKE', $request->search.'%')->paginate($perPage);
            } else {
                $members = Member::paginate($perPage);
            }
        
            return view('admin.member.index', compact('members'));        

    }
    public function create(){
        return view('admin.member.create');
    }
    public function store(Request $request)
    {
        // Validasi data member
        $memberData = [
            'nama' => 'required',
            'JK' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'durasi' => 'required',
            'total_biaya' => 'required',
            'status' => 'required',
        ];

        // Validasi data member
        $validatedData = $request->validate($memberData);
        $total_biaya = $request->get('total_biaya');

        // Menyimpan data member ke dalam database
        $member = member::create($validatedData + [
            'user_id' => auth()->id()
        ]);

        return redirect()->route('member.admin.index', ['id' => $member->id, 'total_biaya' => $total_biaya])
        ->with([
            'message' => 'Pendaftaran anda berhasil, Silahkan upload bukti pembayaran!',
            'alert-type' => 'success'
        ]);
    }
    public function update($id){
        $member = member::find($id);
        return view('admin.member.update', compact(['member']));
    }
    public function edit($id, Request $request){
        $member = member::find($id);
        $member->update($request->except(['_token', 'submit']));
        return redirect()->route('member.admin.index');
    }
    public function delete($id){
        $member = member::find($id);
        $member->delete();
        return redirect()->route('member.admin.index');
    }
}
