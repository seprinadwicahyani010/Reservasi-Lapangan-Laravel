@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <!-- Form Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="bg-light rounded h-100 p-4">
                <div class="col-sm-12 ">
                    <div class=" rounded h-100 p-4">
                        <h4 class="mb-4">Edit Data</h4>
                        <form action="/pelatih/{{ $pelatih->id }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $pelatih->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="JK" class="form-label">Jenis Kelamin</label>
                                <select id="JK" class="form-control" name="JK">
                                    <option selected>Choose...</option>
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="{{ $pelatih->tgl_lahir }}">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{ $pelatih->alamat }}">
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor Handphone</label>
                                <input type="text" name="no_hp" class="form-control" placeholder="Nomor Handphone" value="{{ $pelatih->no_hp }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- Form End -->

    </div>
@endsection
