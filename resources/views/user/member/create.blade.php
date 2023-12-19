@extends('layouts.user')
@section('content')
<div class="container-fluid bg-primary hero-header mb-5">
    <div class="container text-center">
        <h1 class="display-4 text-white mb-3 animated slideInDown">Pendaftaran Member</h1>
    </div>
</div>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow" style="max-width: 1000px; margin: 0 auto;">
                <div class="card-body">
                    <form action="/member/store" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="nama">Nama</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ auth()->user()->name }}" readonly>
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
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="durasi">Durasi</label>
                        <div class="col-sm-9">
                        <input type="number" class="form-control" id="durasi" name="durasi" min="1" placeholder="ex: 1" required>
                        </div>
                    </div><br>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="total_biaya">Total Harga:</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="total_biaya" name="total_biaya" readonly>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil elemen input durasi dan total harga
        var durasiInput = document.getElementById('durasi');
        var totalHargaInput = document.getElementById('total_biaya');

        // Tambahkan event listener untuk menghitung total harga saat nilai durasi berubah
        durasiInput.addEventListener('input', function () {
            // Ambil nilai durasi
            var durasi = durasiInput.value;

            // Hitung total harga (contoh: durasi dikali dengan 300,000)
            var totalBiaya = durasi * 300000;

            // Isi nilai total harga ke dalam input total harga
            totalHargaInput.value = totalBiaya;
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
