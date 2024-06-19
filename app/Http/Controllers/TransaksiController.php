<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\Tagihan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Queue\Failed\PrunableFailedJobProvider;

class TransaksiController extends Controller
{
    public function index()
    {
        $tagihans = Tagihan::with(['pengguna', 'paket'])
                           ->orderBy('tgl_bayar', 'desc')
                           ->get();
    
        return view('transaksi.index', compact('tagihans'));
    }
     public function bayar($id_tagihan)
    {
        // Tambahkan logging query sebelum pemanggilan findOrFail
        $query = Tagihan::with('pengguna', 'paket')->where('id_tagihan', $id_tagihan);
        \Log::info($query->toSql());
        
        // Cari tagihan berdasarkan id_tagihan
        $tagihan = Tagihan::with('pengguna', 'paket')->where('id_tagihan', $id_tagihan)->firstOrFail();

        // Gabungkan nama pengguna dan nama paket
        $keterangan = $tagihan->pengguna->nama_lengkap . ', ' . $tagihan->paket->nama_paket;

        // Buat entri baru di tabel kas
        Kas::create([
            'tgl_kas' => now(),
            'keterangan' => $keterangan,
            'pemasukan' => $tagihan->jumlah_bayar,
            'pengeluaran' => 0,
            'jenis_kas' => 'masuk',
            'id_tagihan' => $tagihan->id_tagihan
        ]);

        // Update status tagihan menjadi sudah bayar
        $tagihan->terbayar = $tagihan->jumlah_bayar;
        $tagihan->save();

        return redirect()->back()->with('success', 'Tagihan berhasil dibayar');
    }
}
