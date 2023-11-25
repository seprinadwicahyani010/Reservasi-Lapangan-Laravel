<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kursus;
use App\Models\member;
use App\Models\Pelatih;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMember = member::getTotalMembers();
        $totalKursus = Kursus::getTotalKursus();
        $totalPelatih = Pelatih::getTotalPelatih();

        return view('admin.dashboard', compact('totalMember', 'totalKursus', 'totalPelatih'));
    }
}
