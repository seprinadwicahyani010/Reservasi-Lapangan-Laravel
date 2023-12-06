@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <!-- Form Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="bg-light rounded h-100 p-4">
                <div class="col-sm-12 ">
                    <div class=" rounded h-100 p-4">
                        <h4 class="mb-4">Tambah Data</h4>
                        <form action="{{ route('kursus.admin.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="umur" class="form-label">Umur <span class="text-danger">*</span></label>
                                <input type="text" name="umur" class="form-control" placeholder="ex: 5" required>
                            </div>
                            <div class="mb-3">
                                <label for="JK" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select id="JK" class="form-control" name="JK" required>
                                    <option selected>Choose...</option>
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor Handphone <span class="text-danger">*</span></label>
                                <input type="text" name="no_hp" class="form-control" placeholder="ex: 08xxxxxxxxx" required>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select id="status" class="form-control" name="status" required>
                                    <option selected>Choose...</option>
                                    <option>Menunggu Verifikasi</option>
                                    <option>Aktif</option>
                                    <option>Tidak Aktif</option>
                                </select>
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
