<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Lapangan;
use App\Models\member;
use App\Models\Pelatih;
use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public $sources = [
        [
            'model'      => Pemesanan::class,
            'date_field' => 'waktu_mulai',
            'date_field_to' => 'waktu_akhir',
            'field'      => 'user_id',
            'nama_lapangan'      => 'lapangan_id',
            'prefix'     => '',
            'suffix'     => '',
        ],
    ];
    public function index(Request $request)
    {
        $totalMember = member::getTotalMembers();
        $totalKursus = Kursus::getTotalKursus();
        $totalPelatih = Pelatih::getTotalPelatih();
        $pemesanan = [];
        $lapanganList = Lapangan::all();

        foreach ($this->sources as $source) {
                $models = $source['model']::where('status', '!=', 'Gagal')->get();

            foreach ($models as $model) {
                $crudFieldValue = $model->getOriginal($source['date_field']);
                $crudFieldValueTo = $model->getOriginal($source['date_field_to']);
                $lapangan = Lapangan::findOrFail($model->getOriginal($source['nama_lapangan']));
                $user = User::findOrFail( $model->getOriginal($source['field']));
                $timeBreak = \Carbon\Carbon::parse($crudFieldValueTo)->format('H:i');


                if (!$crudFieldValue && $crudFieldValueTo) {
                    continue;
                }

                $pemesanan[] = [
                    'title' => trim($source['prefix'] . "($lapangan->nama_lapangan)" . $user->name
                        . " " ). " " . $timeBreak,
                    'start' => $crudFieldValue,
                    'end' => $crudFieldValueTo,
                ];
            }
        }

        return view('admin.dashboard', compact('totalMember', 'totalKursus', 'totalPelatih', 'pemesanan', 'lapanganList'))->with('success', 'Kamu berhasil login sebagai admin');
    }
    public function index_user()
    {
        return view ('user.home')->with('success', 'Kamu berhasil login ke Laman User');
    }
}
