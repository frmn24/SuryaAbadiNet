<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        // $pengguna = Pengguna::table('pengguna')->paginate(10);
        $pengguna = Pengguna::all();
        // $pengguna = Pengguna::paginate(10);
        return view('pengguna.index',compact(['pengguna']));
    }
    public function create()
    {
        return view('pengguna.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required|min:5',
            'username'=>'required|min:5',
            'password'=>'required',
            'level'=>'required',
        ]);
        Pengguna::create([
            'nama'=>$request->nama,
            'username'=>$request->username,
            'password'=>$request->password,
            'level'=>$request->level,
        ]);

        return redirect('/pengguna')->with('success','Berhasil Menambah Data Pengguna');
    }
    public function edit($id){
        $pengguna = Pengguna::find($id);
        return view('pengguna.edit',compact('pengguna'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'nama'=>'required|min:5',
            'username'=>'required|min:5',
            'password'=>'required',
            'level'=>'required',
        ]);
        $pengguna = Pengguna::find($id);
        $pengguna->update([
            'nama'=>$request->nama,
            'username'=>$request->username,
            'password'=>$request->password,
            'level'=>$request->level,
        ]);

        return redirect('/pengguna')->with('success','Berhasil Mengubah Data Pengguna');
    }
    public function destroy($id){
        $pengguna = Pengguna::find($id);
        $pengguna->delete();

        return redirect('/pengguna')->with('success','Berhasil Menghapus Data Pengguna');
    }
}
