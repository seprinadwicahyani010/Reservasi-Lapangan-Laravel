@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                        <h4 class="mb-4">Data Lapangan</h4>
                        <button type="button" class="btn btn-primary m-2"><a href="/lapangan/create" style="color: white">Tambah Data</a></button>
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
                                    @foreach ($lapangan as $item)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>
                                                <img src="{{ asset('storage/gambar/' . $item->gambar) }}" alt="" class="img-fluid" width="100">
                                            </td>
                                            <td>{{ $item->nama_lapangan }}</td>
                                            <td>Rp{{ number_format($item->harga, 2, ',', '.') }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary m-2"><a href="/lapangan/{{ $item->id }}/update" style="color: white">Edit</a></button>
                                                <button type="button" class="btn btn-danger m-2"><a href="/lapangan/{{ $item->id }}/delete" style="color: white">Hapus</a></button>
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
