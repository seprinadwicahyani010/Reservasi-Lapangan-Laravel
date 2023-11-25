@extends('admin.layouts.app')
@section('content')
    <div class="container">
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-users fa-3x text-primary"></i> <!-- Ganti dengan ikon users -->
                            <div class="ms-3">
                                <h4 class="mb-2">Member</h4>
                                <h6 class="mb-0">{{ $totalMember }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-book fa-3x text-primary"></i> <!-- Ganti dengan ikon book atau ikon lainnya -->
                            <div class="ms-3">
                                <h4 class="mb-2">Kursus</h4>
                                <h6 class="mb-0">{{ $totalKursus }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-chalkboard-teacher fa-3x text-primary"></i> <!-- Ganti dengan ikon chalkboard-teacher atau ikon lainnya -->
                            <div class="ms-3">
                                <h4 class="mb-2">Pelatih</h4>
                                <h6 class="mb-0">{{ $totalPelatih }}</h6>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
            <!-- Sale & Revenue End -->
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
                // put your options and callbacks here
                events: pemesanan
        
        
            });
        });
@endsection