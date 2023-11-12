@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                        <h4 class="mb-4">Data Lapangan</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Lapangan</th>
                                        <th scope="col">Harga Sewa</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($lapangan as $lapangan)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td><img src="{{ $lapangan->gambar }}" alt="" class="img-fluid" width="100"></td>
                                            <td>{{ $lapangan->nama_lapangan }}</td>
                                            <td>{{ $lapangan->harga }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary m-2"><a href="" style="color: white">Edit</a></button>
                                                <button type="button" class="btn btn-danger m-2"><a href="" style="color: white">Hapus</a></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
        <!-- Table End -->
    </div>
@endsection