@extends('user.layout.app')
<section class="page-section">
<div class="container">
    <div class="text-center">
        <h2 class="section-heading text-uppercase">Reservation</h2>
        <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
    </div>
    <div class="row">
        @foreach($lapanganList as $lapangan)      
            <div class="col-lg-4 mb-5">
                <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Nama Lapangan : {{$lapangan->nama_lapangan}}</h5>
                    <p class="card-text">Harga : Rp{{ number_format($lapangan->harga,2,',','.') }} / Jam</p>
                    <a href="{{ route('pemesanan', ['nama_lapangan' => $lapangan->nama_lapangan])  }}" class="btn btn-primary">Booking</a>
                </div>
                </div>
            </div>
        @endforeach 
    </div>
</div>

<div class="container">    
    <div class="card">
        <div class="card-header">
            Jadwal Booking Lapangan
        </div>

        <div class="card-body">
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

            <div id='calendar'></div>
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
        // put your options and callbacks here
        events: pemesanan


    });
});
</script>
</section>