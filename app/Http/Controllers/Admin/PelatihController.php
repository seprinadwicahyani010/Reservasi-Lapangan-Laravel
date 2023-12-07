<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelatih;
use Illuminate\Http\Request;

class PelatihController extends Controller
{
    public function index(Request $request){
        if($request-> has('search')){
            $pelatih = Pelatih::where('nama', 'LIKE', '%'.$request->search.'%')->paginate(5);
        }else{
            $pelatih = Pelatih::all();
        }
        return view('admin.pelatih.index', compact(['pelatih']));
    }
    public function create(){
        return view('admin.pelatih.create');
    }
    public function store(Request $request){
        Pelatih::create($request->except(['_token', 'submit']));
        return redirect('/pelatih');
    }
    public function update($id){
        $pelatih = Pelatih::find($id);
        return view('admin.pelatih.update', compact(['pelatih']));
    }
    public function edit($id, Request $request){
        $pelatih = Pelatih::find($id);
        $pelatih->update($request->except(['_token', 'submit']));
        return redirect('/pelatih');
    }
    public function delete($id){
        $pelatih = Pelatih::find($id);
        $pelatih->delete();
        return redirect('/pelatih');
    }
}
