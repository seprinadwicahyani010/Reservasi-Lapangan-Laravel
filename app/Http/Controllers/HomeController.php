<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        return view('admin.dashboard')->with('success', 'Kamu berhasil login sebagai admin');
    }
    public function index_user()
    {
        session()->flash('success', 'Kamu berhasil login ke Laman User');
        return view ('user.home')->with('success', 'Kamu berhasil login ke Laman User');
    }
}
