@extends('layouts.user')
@section('content')
<div class="container-fluid bg-primary hero-header mb-5">
    <div class="container text-center">
        <h1 class="display-4 text-white mb-3 animated slideInDown">Member</h1>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <img class="img-fluid animated pulse infinite" src="{{ asset('assets/img/orang.png') }}">
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="text-primary mb-4">Tentang <span class="fw-light text-dark">Member</span></h1>
                <p class="mb-4">Selamat datang di komunitas eksklusif para anggota! <br> Di sini, kami menyambut Anda dalam lingkungan bulutangkis yang penuh semangat. Sebagai member lapangan badminton kami, Anda tidak hanya mendapatkan akses eksklusif ke fasilitas terbaik, tetapi juga menjadi bagian dari komunitas yang bersatu dalam cinta untuk olahraga ini. Dapatkan keuntungan dari jadwal fleksibel dan kesempatan untuk bertemu dengan sesama pecinta bulutangkis. </p>
                <p class="mb-4">Segera nikmati semua keistimewaan menjadi anggota, tempat di mana passion bertemu prestasi!</p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid how-to-use bg-primary py-5">
    <div class="container text-white py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            @foreach ($panduan as $panduan)
            <p class="mb-5">{{ $panduan->deskripsi }}</p>
            @endforeach
            <h2 class="text-white mb-3"><span class="fw-light text-dark">Nikmati semua keistimewaan</span> dengan mendaftar 
                <span class="fw-light text-dark">Member</span></h2>
            @auth
                <a href="{{ route('member')  }}" class="btn btn-primary">Daftar Sekarang</a>
            @else
                <!-- Tombol untuk membuka modal -->
                <button type="button" class="btn btn-primary px-3" onclick="showLoginModal()">Daftar Sekarang</button>
            @endauth
        </div>
    </div>
</div>
<div class="container">
    <div class="text-center">
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Notifikasi</h5>
                    </div>
                    <div class="modal-body">
                        Anda harus login untuk melakukan pendaftaran member.
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
