@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h4>Ubah Data Paket</h4>
                <a href="/datapaket" class="btn bg-gradient-dark float-end mb-0"><i aria-hidden="true"></i>&nbsp;&nbsp;Kembali</a>
            </div>
            <div class="card-body px-0 pt-3 pb-2">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/datapaket/{{ $datapaket->id }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Paket</label>
                                <input class="form-control" type="text" name="nama_paket" onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $datapaket->nama_paket }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Harga Paket</label>
                                <input class="form-control" type="number" name="harga_paket" onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $datapaket->harga_paket }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Gambar Paket</label>
                                <input class="form-control" type="file" name="gambar">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
