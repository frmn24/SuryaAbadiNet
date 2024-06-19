@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-3 pt-3" style="background-color: #ba22a1; padding-top: 5px; padding-bottom: 5px; display: flex; align-items: center;">
                <h6 style="margin-bottom: 0; color: white;">Data Transaksi</h6>
                <!-- <a href="/kas/create" class="btn bg-gradient-dark ms-auto" href="javascript:;"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Tambah</a> -->
            </div>
            <div class="card-body px-0 pt-0 pb-2">  
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">keterangan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kas Masuk</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kas Keluar</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ubah</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataKas as $kas)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kas->keterangan }}</td>
                                <td>{{ $kas->tgl_kas }}</td>
                                <td class="text-center">{{ $kas->pemasukan }}</td>
                                <td class="text-center">{{ $kas->pengeluaran }}</td>
                                <td>
                                    @if($kas->jenis_kas == 'masuk')
                                        <button type="button" class="btn btn-secondary" disabled>Ubah</button>
                                    @else
                                        <a class="btn btn-warning" href="#">Ubah</a>
                                    @endif
                                </td>
                                <td>
                                    @if($kas->jenis_kas == 'masuk')
                                        <button type="button" class="btn btn-secondary" disabled>Hapus</button>
                                    @else
                                        <a class="btn btn-danger" href="#">Hapus</a>
                                    @endif
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
