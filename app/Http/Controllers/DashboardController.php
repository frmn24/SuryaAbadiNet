<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\Kas;
use App\Models\Tagihan;

class DashboardController extends Controller
{
    public function index()
{
    $jumlah_pengguna = Pengguna::count();
    $jumlah_pemasukan = Kas::where('jenis_kas', 'masuk')->sum('pemasukan');
    $jumlah_pengeluaran = Kas::where('jenis_kas', 'keluar')->sum('pengeluaran');
    $jumlah_transaksi = Tagihan::count();

    return view('dashboard.index', compact('jumlah_pengguna', 'jumlah_pemasukan', 'jumlah_pengeluaran', 'jumlah_transaksi'));
}

}
