@extends('user.layout.app')
@section('content')
<!-- Hero Start -->
<div class="container-fluid bg-primary hero-header mb-5">
    <div class="container text-center">
        <h1 class="display-4 text-white mb-3 animated slideInDown">Transaksi</h1>
    </div>
</div>
<!-- Hero End -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="contact-info-item position-relative bg-primary text-center p-3">
                    <div class="border py-5 px-3">
                        <i class="fa fa-check fa-3x text-dark mb-4"></i>
                        <h5 class="text-white">Reservasi</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="contact-info-item position-relative bg-primary text-center p-3">
                    <div class="border py-5 px-3">
                        <i class="fa fa-check fa-3x text-dark mb-4"></i>
                        <h5 class="text-white">Member</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="contact-info-item position-relative bg-primary text-center p-3">
                    <div class="border py-5 px-3">
                        <i class="fa fa-check fa-3x text-dark mb-4"></i>
                        <h5 class="text-white">Kursus</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
@endsection