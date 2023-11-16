@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <!-- Form Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 ">
                    <div class=" rounded h-100 p-4">
                        <h4 class="mb-4">Tambah Data</h4>
                        <form action="/lapangan/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_lapangan" class="form-label">Nama Lapangan</label>
                                <input type="text" name="nama_lapangan" class="form-control" placeholder="Nama Lapangan">
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga Sewa</label>
                                <input type="text" name="harga" class="form-control" placeholder="Harga Sewa">
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input class="form-control" type="file" id="gambar" name="gambar">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form End -->

    </div>
@endsection