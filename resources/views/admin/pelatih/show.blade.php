<!-- resources/views/pelatih/show.blade.php -->

@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="bg-light rounded h-100 p-4">
                    <div class="col-12">
                        <h3 class="mb-4">Detail Pelatih</h3>
                        <form>
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" value="{{ $pelatih->nama }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="jk" class="form-label">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jk" value="{{ $pelatih->JK }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="tgl_lahir" value="{{ $pelatih->tgl_lahir }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" rows="3" readonly>{{ $pelatih->alamat }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No Handphone</label>
                                <input type="text" class="form-control" id="no_hp" value="{{ $pelatih->no_hp }}" readonly>
                            </div>
                            <a href="/pelatih" class="btn btn-primary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
