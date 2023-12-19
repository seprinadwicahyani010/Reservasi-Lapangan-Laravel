@extends('layouts.user')
@section('content')
<div class="container-fluid bg-primary hero-header mb-5">
    <div class="container text-center">
        <h1 class="display-4 text-white mb-3 animated slideInDown">Reservasi</h1>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h2 class="text-primary mb-3"><span class="fw-light text-dark">Reservasi Lapangan</span> dengan Mudah</h2>
            <p class="mb-5">Nikmati keseruan bermain badminton dengan fasilitas lapangan terbaik</p>
        </div>
        <div class="row g-4">
            @foreach($lapanganList as $lapangan)  
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="blog-item border h-100 p-4">
                    <img class="img-fluid mb-4" src="{{ asset('Gambar Lapangan/' . $lapangan->gambar) }}" alt="">
                    <a href="" class="h5 lh-base d-inline-block">{{$lapangan->nama_lapangan}}</a>
                    <p class="mb-4">Harga : Rp{{ number_format($lapangan->harga,2,',','.') }} / Jam</p>
                    @auth
                        <a href="{{ route('pemesanan', ['nama_lapangan' => $lapangan->nama_lapangan]) }}" class="btn btn-outline-primary px-3">Reservasi Sekarang</a>
                    @else
                        <!-- Tombol untuk membuka modal -->
                        <button type="button" class="btn btn-outline-primary px-3" onclick="showLoginModal()">Reservasi Sekarang</button>
                    @endauth
                </div>
            </div>
            @endforeach
            <!-- Modal -->
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
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
</div>
    
<div class="container-fluid py-5">
<div class="container">
    <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
        <h2 class="text-primary mb-3"><span class="fw-light text-dark">Jadwal</span> Reservasi Lapangan</h2>
    </div>
    <br>    
    <div class="card">
        <div class="card-body">
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

            <div id='calendar'></div>
        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
$(document).ready(function () {
    // page is now ready, initialize the calendar...
   
    pemesanan={!! json_encode($pemesanan) !!};

    console.log(pemesanan)
    $('#calendar').fullCalendar({
        
        events: pemesanan


    });
});
</script>
<!-- Script untuk menampilkan modal -->
<script>
    function showLoginModal() {
        $('#loginModal').modal('show');
    }
</script>
@endsection
