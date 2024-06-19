<?php

namespace App\Http\Controllers;

use App\Models\Datapaket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DatapaketController extends Controller
{
    public function index()
    {
        $datapaket = Datapaket::all();
        return view('datapaket.index',compact(['datapaket']));
    }
    public function create()
    {
        return view('datapaket.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required',
            'harga_paket' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk jenis file gambar yang diunggah
        ]);
    
        // Simpan gambar jika diunggah
        $imageName = null;
        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension(); // Generate nama unik untuk gambar
            $request->gambar->move(public_path('gambarPaket'), $imageName); // Simpan gambar ke dalam penyimpanan
        }
    
        // Buat data paket
        $datapaket = Datapaket::create([
            'nama_paket' => $request->nama_paket,
            'harga_paket' => $request->harga_paket,
            'gambar' => $imageName, // Simpan nama gambar ke dalam kolom 'gambar' di database
        ]);

        return redirect('/datapaket')->with('success', 'Berhasil Menambah Data Paket');
    }

    public function edit($id){
        $datapaket = Datapaket::find($id);
        return view('datapaket.edit',compact('datapaket'));
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'nama_paket' => 'required|string|max:255',
        'harga_paket' => 'required|numeric',
        'gambar' => 'nullable|sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $datapaket = Datapaket::findOrFail($id);

    // Update nama paket dan harga paket
    $datapaket->nama_paket = $request->nama_paket;
    $datapaket->harga_paket = $request->harga_paket;

    // Periksa jika ada gambar baru yang diunggah
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada (opsional)
        if ($datapaket->gambar && file_exists(public_path('gambarPaket/' . $datapaket->gambar))) {
            unlink(public_path('gambarPaket/' . $datapaket->gambar));
        }

        // Simpan gambar baru di public/gambarPaket
        $imageName = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('gambarPaket'), $imageName);

        // Update kolom gambar dengan nama gambar baru
        $datapaket->gambar = $imageName;
    }

    // Simpan perubahan data paket
    $datapaket->save();

    return redirect('/datapaket')->with('success', 'Berhasil Mengubah Data Paket');
    }

    public function destroy($id){
        $datapaket = Datapaket::find($id);
        $datapaket->delete();

        return redirect('/datapaket')->with('success','Berhasil Menghapus Data Paket');
    }
}
