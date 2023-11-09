@extends('user.layout.app')
@section('content')

    <div class="content">
        <!-- Hero Start -->
        <div class="container-fluid bg-primary hero-header mb-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h3 class="fw-light text-white animated slideInRight">Natural & Organic</h3>
                        <h1 class="display-4 text-white animated slideInRight">Hair <span class="fw-light text-dark">Shampoo</span> For Healthy Hair</h1>
                        <p class="text-white mb-4 animated slideInRight">Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Etiam feugiat rutrum lectus, sed auctor ex malesuada id. Orci varius natoque penatibus et
                            magnis dis parturient montes.</p>
                        <a href="" class="btn btn-dark py-2 px-4 me-3 animated slideInRight">Shop Now</a>
                        <a href="" class="btn btn-outline-dark py-2 px-4 animated slideInRight">Contact Us</a>
                    </div>
                    <div class="col-lg-6">
                        <img class="img-fluid animated pulse infinite" src="img/shampoo.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
    </div>
    <!-- Contact Info Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="contact-info-item position-relative bg-primary text-center p-3">
                        <div class="border py-5 px-3">
                            <i class="fa fa-map-marker-alt fa-3x text-dark mb-4"></i>
                            <h5 class="text-white">Office Address</h5>
                            <h5 class="fw-light text-white">123 Street, New York, USA</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="contact-info-item position-relative bg-primary text-center p-3">
                        <div class="border py-5 px-3">
                            <i class="fa fa-phone-alt fa-3x text-dark mb-4"></i>
                            <h5 class="text-white">Call Us</h5>
                            <h5 class="fw-light text-white">+012 345 67890</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="contact-info-item position-relative bg-primary text-center p-3">
                        <div class="border py-5 px-3">
                            <i class="fa fa-envelope fa-3x text-dark mb-4"></i>
                            <h5 class="text-white">Mail Us</h5>
                            <h5 class="fw-light text-white">info@example.com</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Info End -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
@endsection
    