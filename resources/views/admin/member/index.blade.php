@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                        <h4 class="mb-4">Data Member</h4>
                        <button type="button" class="btn btn-primary m-2"><a href="/member/create" style="color: white">Tambah Data</a></button>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">No Handphone</th>
                                        <th scope="col">Durasi (perbulan)</th>
                                        <th scope="col">Total Harga</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($member as $member)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $member->nama }}</td>
                                            <td>{{ $member->JK }}</td>
                                            <td>{{ $member->alamat }}</td>
                                            <td>{{ $member->no_hp }}</td>
                                            <td>{{ $member->durasi }}</td>
                                            <td>{{ $member->total_biaya }}</td>
                                            <td>{{ $member->status }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary m-2"><a href="/member/{{ $member->id }}/update" style="color: white">Edit</a></button>
                                                <button type="button" class="btn btn-danger m-2"><a href="/member/{{ $member->id }}/delete" style="color: white">Hapus</a></button>
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