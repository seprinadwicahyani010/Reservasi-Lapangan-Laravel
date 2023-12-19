@extends('layouts.user')
@section('content')
    <div class="container-fluid bg-primary hero-header">
        <div class="container text-center">
            <h1 class="display-4 text-white mb-3 animated slideInDown">Reservasi</h1>
        </div>
    </div>

    <div class="container my-5">
        @if (session()->has('message'))
            <div class="alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert"
                id="alert-message">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow" style="max-width: 1000px; margin: 0 auto;">
                    <div class="card-body">
                        <form action="{{ route('pemesanan.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="lapangan_id">{{ __('Lapangan') }}</label>
                                <div class="col-sm-9">
                                    <select name="lapangan_id" id="lapangan_id" class="form-control">
                                        @foreach ($lapangan as $lapangan)
                                            <option {{ $nama_lapangan == $lapangan->nama_lapangan ? 'selected' : null }}
                                                value="{{ $lapangan->id }}">{{ $lapangan->nama_lapangan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><br>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="nama">{{ __('Nama') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ auth()->user()->name }}" readonly />
                                </div>
                            </div><br>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="no_hp">{{ __('Nomor Handphone') }}</label>
                                <div class="col-sm-9">
                                    <input type="tel" class="form-control" id="no_hp" name="no_hp" required pattern="[0-9]{10,13}"/>
                                </div>
                            </div><br>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="waktu_mulai">{{ __('Jam Mulai') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control datetimepicker" id="waktu_mulai"
                                        name="waktu_mulai" value="{{ old('waktu_mulai') }}" required/>
                                </div>
                            </div><br>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="waktu_akhir">{{ __('Jam Berakhir') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control datetimepicker" id="waktu_akhir"
                                        name="waktu_akhir" value="{{ old('waktu_akhir') }}" required/>
                                </div>
                            </div><br>
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Reservasi') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>
    <script>
        $('.datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            locale: 'en',
            sideBySide: true,
            icons: {
                up: 'fas fa-chevron-up',
                down: 'fas fa-chevron-down',
                previous: 'fas fa-chevron-left',
                next: 'fas fa-chevron-right'
            },
            stepping: 10
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
@endsection
