<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Panduan;
use App\Models\Pelatih;
use Illuminate\Http\Request;

class PanduanController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 5; 

        if ($request->has('search')) {
            $panduan = Panduan::where('nama', 'LIKE', '%'.$request->search.'%')->paginate($perPage);
        } else {
            $panduan = Panduan::paginate($perPage);
        }

        return view('admin.panduan.index', compact('panduan'));
    }
    public function create(){
        return view('admin.panduan.create');
    }
    public function store(Request $request){
        Panduan::create($request->except(['_token', 'submit']));
        return redirect('/panduan');
    }
    public function update($id){
        $panduan = Panduan::find($id);
        return view('admin.panduan.update', compact(['panduan']));
    }
    public function edit($id, Request $request){
        $panduan = Panduan::find($id);
        $panduan->update($request->except(['_token', 'submit']));
        return redirect('/panduan');
    }
    public function delete($id){
        $panduan = Panduan::find($id);
        $panduan->delete();
        return redirect('/panduan');
    }
}
