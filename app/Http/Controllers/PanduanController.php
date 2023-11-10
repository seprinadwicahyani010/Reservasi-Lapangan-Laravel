<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanduanController extends Controller
{
    public function member(){
        $member = DB::select("SELECT * FROM panduans WHERE nama=Member");
        return view('bodycare', compact('produks'));
    }
}
