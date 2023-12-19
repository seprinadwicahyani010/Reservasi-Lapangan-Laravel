@extends('layouts.user')
@section('content')
<div class="container-fluid bg-primary hero-header mb-5">
    <div class="container text-center">
        <h1 class="display-4 text-white mb-3 animated slideInDown">Kursus</h1>
    </div>
</div>
<div class="container-fluid py-3">
    <div class="container">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h2 class="text-primary mb-3"><span class="fw-light text-dark">Selamat datang </span>di pusat pembelajaran badminton kami</h2>
            <p class="mb-5">Segera dapatkan pembelajaran badminton dengan pelatih berpengalaman, fasilitas modern, dan kurikulum yang terstruktur</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row g-4">
    @foreach ($pelatih as $pelatih)
    <div class="col-lg-4 text-center wow fadeIn" data-wow-delay="0.1s">
    <div class="container-fluid how-to-use bg-primary my-5 py-5">
        <div class="btn-square rounded-circle border mx-auto mb-4" style="width: 120px; height: 120px;">
            <i class="fa fa-user fa-3x text-dark"></i>
        </div>
        <h5 class="text-dark">{{ $pelatih->nama }}</h5>
        <hr class="w-25 bg-light my-2 mx-auto">
        <span class="text-dark">Pelatih</span>
    </div>
    </div>
    @endforeach
    </div>
</div>
</div>

<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <img class="img-fluid animated pulse infinite" src="{{ asset('assets/img/orang.png') }}">
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="text-primary mb-4">Syarat <span class="fw-light text-dark">dan Ketentuan</span></h1>
                <p class="mb-4">
                    @foreach ($panduan as $panduan)
                    <ul>
                        <li>{{ $panduan->deskripsi }}</li>
                    </ul>
                    @endforeach
                </p>
                @auth
                    <a href="{{ route('kursus')  }}" class="btn btn-primary">Daftar Sekarang</a>
                @else
                    <button type="button" class="btn btn-outline-primary px-3" onclick="showLoginModal()">Daftar Sekarang</button>
                @endauth
        </div>
    </div>
</div>

<div class="container">
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Notifikasi</h5>
                    </div>
                    <div class="modal-body">
                        Anda harus login untuk melakukan pendaftaran kursus.
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    function showLoginModal() {
        $('#loginModal').modal('show');
    }
</script>
@endsection
