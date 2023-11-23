@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="bg-light rounded h-100 p-4">
                    <div class="col-12">
                        <h3 class="mb-4">Reservasi</h3>
                        <div style="float: right;">
                            <form action="{{ route('pemesanan.admin.index') }}" method="GET" class="d-none d-md-flex">
                                <div class="input-group">
                                    <input class="form-control border rounded-0" type="search" placeholder="Search" name="search" style="max-width: 250px; max-height: 50px;">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <button type="button" class="btn btn-primary m-2"><a href="/admin/pemesanan/create" style="color: white">Tambah Data</a></button>
                    </div>
                <div class="col-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Lapangan</th>
                                        <th scope="col">No Handphone</th>
                                        <th scope="col">Waktu Mulai</th>
                                        <th scope="col">Waktu Akhir</th>
                                        <th scope="col">Total Harga</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($pemesanan as $pemesanan)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $pemesanan->nama }}</td>
                                            <td>{{ $pemesanan->lapangan_id }}</td>
                                            <td>{{ $pemesanan->no_hp }}</td>
                                            <td>{{ $pemesanan->waktu_mulai }}</td>
                                            <td>{{ $pemesanan->waktu_akhir }}</td>
                                            <td>{{ $pemesanan->total_harga }}</td>
                                            <td>{{ $pemesanan->status }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary m-2"><a href="/admin/pemesanan/{{ $pemesanan->id }}/update" style="color: white">Edit</a></button>
                                                <button type="button" class="btn btn-danger m-2"><a href="/admin/pemesanan/{{ $pemesanan->id }}/delete" style="color: white">Hapus</a></button>
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
