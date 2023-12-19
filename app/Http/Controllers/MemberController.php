<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index()
    {
        $panduan = DB::select("SELECT * FROM panduans WHERE nama='Member'");
        return view('user.member.index', compact('panduan'));
    }

    public function create(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('warning', 'Anda harus login untuk melakukan reservasi.');
        }

        $user = User::all();
        $nama_user = $request->get('name');
        return view('user.member.create', compact('user', 'nama_user'));
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
        ];

        $validatedData = $request->validate($memberData);
        $total_biaya = $request->get('total_biaya');

        $tgl_mulai = Carbon::now();

        $tgl_akhir = $tgl_mulai->copy()->addMonths($validatedData['durasi']);

        $member = Member::create($validatedData + [
            'user_id' => auth()->id(),
            'tgl_mulai' => $tgl_mulai,
            'tgl_akhir' => $tgl_akhir,
            'status' => $request->filled('status') ? $request->input('status') : "Menunggu Verifikasi"
        ]);

        return redirect()->route('member.success', ['id' => $member->id, 'total_biaya' => $total_biaya])
            ->with([
                'message' => 'Pendaftaran anda berhasil, Silahkan upload bukti pembayaran!',
                'alert-type' => 'success'
            ]);
    }

    public function success(Request $request, $id){
        $members = member::where('id', $id)->get();
        $total_biaya = $request->get('total_biaya');

        return view('user.member.success', compact('members', 'total_biaya'));
    
    }
}
