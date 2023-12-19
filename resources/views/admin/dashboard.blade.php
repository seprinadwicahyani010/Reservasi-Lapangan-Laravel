@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-4">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fas fa-users fa-3x text-primary"></i>
                        <div class="ms-3">
                            <h4 class="mb-2">Member</h4>
                            <h6 class="mb-0">{{ $totalMember }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fas fa-book fa-3x text-primary"></i>
                        <div class="ms-3">
                            <h4 class="mb-2">Kursus</h4>
                            <h6 class="mb-0">{{ $totalKursus }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fas fa-chalkboard-teacher fa-3x text-primary"></i>
                        <div class="ms-3">
                            <h4 class="mb-2">Pelatih</h4>
                            <h6 class="mb-0">{{ $totalPelatih }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
