@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="bg-light rounded h-100 p-4">
                    <div class="col-12">
                        <h3 class="mb-4">Pelatih</h3>
                        <div style="float: right;">
                            <form action="{{ route('pelatih.index') }}" method="GET" class="d-none d-md-flex">
                                <div class="input-group">
                                    <input class="form-control border rounded-0" type="search" placeholder="Search" name="search" style="max-width: 250px; max-height: 50px;">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <button type="button" class="btn btn-primary m-2"><a href="/pelatih/create" style="color: white">Tambah Data</a></button>
                    </div>
                <div class="col-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Tanggal Lahir</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">No Handphone</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($pelatih as $pelatih)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $pelatih->nama }}</td>
                                            <td>{{ $pelatih->JK }}</td>
                                            <td>{{ $pelatih->tgl_lahir }}</td>
                                            <td>{{ $pelatih->alamat }}</td>
                                            <td>{{ $pelatih->no_hp }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary m-2"><a href="/pelatih/{{ $pelatih->id }}/update" style="color: white">Edit</a></button>
                                                <button type="button" class="btn btn-danger m-2"><a href="/pelatih/{{ $pelatih->id }}/delete" style="color: white">Hapus</a></button>
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
