@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-3 pt-3" style="background-color: #ba22a1; padding-top: 5px; padding-bottom: 5px; display: flex; align-items: center;">
                <h6 style="margin-bottom: 0; color: white;">Data Transaksi</h6>
                <!-- <a href="/datapaket/create" class="btn bg-gradient-dark ms-auto" href="javascript:;"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Tambah Paket</a> -->
            </div>
            <div class="card-body px-0 pt-0 pb-2">  
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pelanggan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Paket</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bulan/Tahun</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tagihan</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Bayar</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tagihans as $tagihan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $tagihan->pengguna ? $tagihan->pengguna->nama_lengkap : 'Pengguna tidak ditemukan' }}</td>
                                    <td>{{ $tagihan->paket ? $tagihan->paket->nama_paket : 'Paket tidak ditemukan' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($tagihan->bulan_tahun)->format('m/Y') }}</td>
                                    <td>{{ $tagihan->jumlah_bayar }}</td>
                                    <td>{{ $tagihan->terbayar ? 'Sudah Bayar' : 'Belum Bayar' }}</td>
                                    <td>
                                        <!-- Tambahkan aksi seperti edit atau delete -->
                                        @if(!$tagihan->terbayar)
                                            <a class="btn btn-primary" href="{{ route('bayar', ['id_tagihan' => $tagihan->id_tagihan]) }}">Bayar</a>
                                        @else
                                            <button class="btn btn-primary" disabled>Bayar</button>
                                        @endif
                                        <a class="btn btn-success" href="https://wa.me/{{ $tagihan->pengguna->no_hp }}?text=Kepada%20Pelanggan%20Wifi%20Bapak/Ibu:%20{{ $tagihan->pengguna->nama_lengkap }},%20alamat:%20{{ $tagihan->pengguna->alamat }},%20Paket:%20{{ $tagihan->paket->nama_paket }},%20Total%20Tagihan:%20Rp%20{{ $tagihan->jumlah_bayar }},%20Pembayaran%20mulai%20tanggal%201-10%20tiap%20bulannya,%20terima%20kasih">Kirim WA</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
