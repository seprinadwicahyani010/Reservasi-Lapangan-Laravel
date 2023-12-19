@extends('layouts.user')
@section('content')
    <div class="content">
        <div class="container-fluid bg-primary hero-header mb-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="display-4 text-white animated slideInRight">Bencoolen <span
                                class="fw-light text-dark">Badminton</span></h1><br>
                        <h5 class="text-dark animated slideInRight">Smash and Drop, Menuju Puncak Prestasi! </h5>
                        <p class="text-white mb-4 animated slideInRight">Selamat datang di tempatnya para juara! Reservasi
                            lapangan bulutangkis dengan kami untuk pengalaman bermain yang intens dan penuh prestasi.
                            Bergabunglah dengan komunitas pemenang, taklukkan lapangan, dan rasakan kemenangan Anda.</p>
                    </div>
                    <div class="col-lg-6">
                        <img class="img-fluid animated pulse infinite" src="{{ asset('assets/img/orang.png') }}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="contact-info-item position-relative bg-primary text-center p-3">
                        <div class="border py-5 px-3">
                            <i class="fa fa-check fa-3x text-dark mb-4"></i>
                            <h5 class="text-white">Lapangan dengan standar nasional</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="contact-info-item position-relative bg-primary text-center p-3">
                        <div class="border py-5 px-3">
                            <i class="fa fa-check fa-3x text-dark mb-4"></i>
                            <h5 class="text-white">Fasilitas badminton yang lengkap</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="contact-info-item position-relative bg-primary text-center p-3">
                        <div class="border py-5 px-3">
                            <i class="fa fa-check fa-3x text-dark mb-4"></i>
                            <h5 class="text-white">Pelatih yang profesional di bidang badminton</h5>
                        </div>
                    </div>
                </div>
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
                    <h1 class="text-primary mb-4">Bencoolen <span class="fw-light text-dark">Badminton</span></h1>
                    <p class="mb-4">Bencoolen Badminton hadir untuk para pecinta badminton! </p>
                    <p class="mb-4">Sebagai penyelenggara lapangan badminton dari tahun 2015, misi kami adalah menciptakan
                        lingkungan yang mendukung, memotivasi, dan memperkaya pengalaman setiap pemain. Dengan fasilitas
                        yang modern, tim kami yang berdedikasi, dan program-program unggulan, kami berusaha menjadi
                        destinasi utama bagi pecinta bulutangkis.</p>
                    @auth
                        <a href="/pemesanan/create" class="btn btn-outline-primary px-3">Reservasi Sekarang</a>
                    @else
                        <!-- Tombol untuk membuka modal -->
                        <button type="button" class="btn btn-outline-primary px-3" onclick="showLoginModal()">Reservasi
                            Sekarang</button>
                    @endauth
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="loginModalLabel">Notifikasi</h5>
                        </div>
                        <div class="modal-body">
                            Anda harus login untuk melakukan reservasi.
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="contact-info-item position-relative bg-primary text-center p-3">
                        <img class="img-fluid animated pulse infinite" src="{{ asset('assets/img/gambar1.jpg') }}">
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="contact-info-item position-relative bg-primary text-center p-3">
                        <img class="img-fluid animated pulse infinite" src="{{ asset('assets/img/gambar2.jpg') }}">
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="contact-info-item position-relative bg-primary text-center p-3">
                        <img class="img-fluid animated pulse infinite" src="{{ asset('assets/img/gambar3.jpg') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Script untuk menampilkan modal -->
    <script>
        function showLoginModal() {
            $('#loginModal').modal('show');
        }
    </script>
@endsection
