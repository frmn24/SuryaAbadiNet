@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0" style="background-color: #ba22a1; padding-top: 5px; padding-bottom: 5px; display: flex; align-items: center;">
                <h6 style="margin-bottom: 0; color: white;">Data Paket</h6>
                <a href="/datapaket/create" class="btn bg-gradient-dark ms-auto" href="javascript:;"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Tambah Paket</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">  
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Paket</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga Paket</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datapaket as $index => $dataa)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $dataa->nama_paket }}</td>
                                <td>{{ $dataa->harga_paket }}</td>
                                <td>
                                    @if (!empty($dataa->gambar))
                                        <img src="{{ asset('gambarPaket/' . $dataa->gambar) }}" alt="Gambar Paket" style="max-width: 100px; max-height: 100px;">
                                    @else
                                        <p>Tidak ada gambar</p>
                                    @endif
                                </td>
                                <td>
                                    <form action="/datapaket/{{ $dataa->id}}" method="POST">
                                        @method("DELETE")
                                        @csrf
                                        <input type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0 far fa-trash-alt me-2" value="Hapus">
                                    </form>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="/datapaket/{{ $dataa->id}}/edit" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
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
