@extends('layouts.user')
@section('content')
<div class="container-fluid bg-primary hero-header mb-5">
    <div class="container text-center">
        <h1 class="display-4 text-white mb-3 animated slideInDown">Pendaftaran Kursus</h1>
    </div>
</div>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow" style="max-width: 1000px; margin: 0 auto;">
                <div class="card-body">
                    <form action="/kursus/store" method="POST">
                    @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="nama">Nama</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                            </div>
                        </div><br>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="tgl_lahir">Tanggal Lahir</label>
                            <div class="col-sm-9">
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" required>
                            </div>
                        </div><br>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="umur">Umur</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="umur" name="umur" placeholder="ex: 7-12" required>
                            </div>
                        </div><br>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="JK">Jenis Kelamin</label>
                            <div class="col-sm-9">
                            <select id="JK" class="form-control" name="JK" required>
                              <option selected>Choose...</option>
                              <option>Laki-Laki</option>
                              <option>Perempuan</option>
                            </select>
                            </div>
                        </div><br>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="alamat">Alamat</label>
                            <div class="col-sm-9">
                            <textarea class="form-control" id="alamat" name="alamat" rows="2" required></textarea>
                            </div>
                        </div><br>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="no_hp">Nomor Handphone</label>
                            <div class="col-sm-9">
                            <input type="tel" class="form-control" id="no_hp" name="no_hp" placeholder="ex: 08xxxxxxxxxx" required pattern="[0-9]{10,13}">
                            </div>
                        </div><br>
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Daftar') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
@endsection
