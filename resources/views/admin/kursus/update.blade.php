@extends('layouts.admin')
@section('content')
    <div class="container">
        <!-- Form Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="bg-light rounded h-100 p-4">
                <div class="col-sm-12 ">
                    <div class=" rounded h-100 p-4">
                        <h4 class="mb-4">Edit Data</h4>
                        <form action="/admin/kursus/{{ $kursus->id }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $kursus->nama }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="{{ $kursus->tgl_lahir }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="umur" class="form-label">Umur <span class="text-danger">*</span></label>
                                <input type="text" name="umur" class="form-control" placeholder="Umur" value="{{ $kursus->umur }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="JK" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select id="JK" class="form-control" name="JK" required>
                                    <option selected>Choose...</option>
                                    <option value="Laki-Laki" {{ $kursus->JK == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ $kursus->JK == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{ $kursus->alamat }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor Handphone <span class="text-danger">*</span></label>
                                <input type="text" name="no_hp" class="form-control" value="{{ $kursus->no_hp }}" required pattern="[0-9]{10,13}">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select id="status" class="form-control" name="status" required>
                                    <option selected>Choose...</option>
                                    <option value="Menunggu Verifikasi" {{ $kursus->status == 'Menunggu Verifikasi' ? 'selected' : '' }}>Menunggu Verifikasi</option>
                                    <option value="Aktif" {{ $kursus->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Tidak Aktif" {{ $kursus->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit Data</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- Form End -->
    </div>
@endsection
