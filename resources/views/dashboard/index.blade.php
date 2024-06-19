@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card mb-4 custom-card">
            <div class="custom-card-details">
                <p class="custom-text-title">Pengguna</p>
                <p class="custom-text-body">Jumlah Pengguna: {{ isset($jumlah_pengguna) ? $jumlah_pengguna : 'Data tidak tersedia' }}</p>
            </div>
            <a href="/pengguna" class="custom-card-button">Lihat<span aria-hidden="true">→</span></a>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card mb-4 custom-card">
            <div class="custom-card-details">
                <p class="custom-text-title">Kas</p>
                <p class="custom-text-body">Jumlah Pemasukan: {{ isset($jumlah_pemasukan) ? $jumlah_pemasukan : 'Data tidak tersedia' }}</p>
                <p class="custom-text-body">Jumlah Pengeluaran: {{ isset($jumlah_pengeluaran) ? $jumlah_pengeluaran : 'Data tidak tersedia' }}</p>

            </div>
            <a href="/kas" class="custom-card-button">Lihat<span aria-hidden="true">→</span></a>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card mb-4 custom-card">
            <div class="custom-card-details">
                <p class="custom-text-title">Transaksi</p>
                <p class="custom-text-body">Jumlah Transaksi: {{ isset($jumlah_transaksi) ? $jumlah_transaksi : 'Data tidak tersedia' }}</p>
            </div>
            <a href="/transaksi" class="custom-card-button">Lihat<span aria-hidden="true">→</span></a>
        </div>
    </div>
</div>
@endsection
