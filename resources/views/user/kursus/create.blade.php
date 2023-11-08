@extends('user.layout.app')
<section class="page-section">
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">{{ __('Daftar Kursus') }}</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/kursus/store" method="POST">
                        @csrf
                            <div class="form-group mb-2">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                            </div>
                            <div class="form-group mb-2">
                                <label for="umur">Umur</label>
                                <input type="text" class="form-control" id="umur" name="umur" placeholder="Umur">
                            </div>
                            <div class="form-group mb-2">
                                <label for="JK">Jenis Kelamin</label>
                                <select id="JK" class="form-control" name="JK">
                                  <option selected>Choose...</option>
                                  <option>Laki-Laki</option>
                                  <option>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="2"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="no_hp">Nomor Handphone</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor Handphone">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Daftar') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>