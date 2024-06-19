@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-3 pt-3" style="background-color: #ba22a1; padding-top: 5px; padding-bottom: 5px; display: flex; align-items: center;">
                <h6 style="margin-bottom: 0; color: white;">Data Pengguna</h6>
                <!-- <a href="/pengguna/create" class="btn bg-gradient-dark ms-auto" href="javascript:;"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Tambah Pengguna</a> -->
            </div>
            <div class="card-body px-0 pt-0 pb-2"> 
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor HP</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengguna as $index => $penguna)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $penguna->nama_lengkap }}</td>
                                <td>{{ $penguna->no_hp }}</td>
                                <td>{{ $penguna->alamat }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Modal Insert -->
            <!-- <div class="modal fade" id="insert-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Pengguna</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/pengguna" class="row g-3 py-1 px-4" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <label class="form-label">Nama Lengkap</label>
                                    <div class="input-group">
                                        <input type="text" name="nama_lengkap" class="form-control rounded-3" required value="{{ old('nama_lengkap') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <div class="input-group">
                                        <input type="email" name="email" class="form-control rounded-3" required value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="text" name="password" class="form-control rounded-3" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nomor HP</label>
                                    <div class="input-group">
                                        <input type="text" name="no_hp" class="form-control rounded-3" required value="{{ old('no_hp') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Alamat</label>
                                    <div class="input-group">
                                        <input type="text" name="alamat" class="form-control rounded-3" required value="{{ old('alamat') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <div class="input-group">
                                        <select name="jenis_kelamin" class="form-control rounded-3" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <div class="input-group">
                                        <input type="date" name="tanggal_lahir" class="form-control rounded-3" required value="{{ old('tanggal_lahir') }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary ml-5 text-sm rounded-3">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- End Modal Insert -->
        </div>
    </div>
</div>
@endsection
