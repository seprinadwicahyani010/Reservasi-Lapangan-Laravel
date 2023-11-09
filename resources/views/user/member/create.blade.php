@extends('user.layout.app')
@section('content')
<!-- Hero Start -->
<div class="container-fluid bg-primary hero-header mb-5">
    <div class="container text-center">
        <h1 class="display-4 text-white mb-3 animated slideInDown">About Us</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">About</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Hero End -->
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
                    <form action="/member/store" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ auth()->user()->name }}" readonly>
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
                    <div class="form-group mb-2">
                        <label for="durasi">Durasi (bulan):</label>
                        <input type="number" class="form-control" id="durasi" name="durasi" min="1" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="total_biaya">Total Harga:</label>
                        <input type="text" class="form-control" id="total_biaya" name="total_biaya" readonly>
                    </div>
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

<!-- Tambahkan link Bootstrap JS dan Popper.js (opsional, hanya jika membutuhkan fitur JavaScript Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
