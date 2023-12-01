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
                        <div class="table-responsive text-nowrap">
                            <table class="table table hover " >
                                <thead>
                                    <tr>
                                        <th >No</th>
                                        <th >Nama</th>
                                        <th >Lapangan</th>
                                        <th >No Handphone</th>
                                        <th >Waktu Mulai</th>
                                        <th >Waktu Akhir</th>
                                        <th >Total Harga</th>
                                        <th >Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
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
                                                <button type="button" class="btn btn-primary m-2"><a href="/admin/pemesanan/{{ $pemesanan->id }}/update" style="color: white"><i class="fas fa-edit" style="color: white;"></i></a></button>
                                                <button type="button" class="btn btn-danger m-2"><a href="/admin/pemesanan/{{ $pemesanan->id }}/delete" style="color: white"><i class="fas fa-trash-alt" style="color: white;"></i></a></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- <div class="pagination pt-4">
                                <ul class="pagination">

                                    <li class="page-item {{ $pemesanan->previousPageUrl() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $pemesanan->previousPageUrl() }}" aria-label="Previous">
                                            <i class="bi bi-chevron-compact-left"></i>
                                        </a>
                                    </li>
                            
                                    @for ($i = 1; $i <= $pemesanan->lastPage(); $i++)
                                        <li class="page-item {{ $i == $pemesanan->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $pemesanan->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                            
                                    <li class="page-item {{ $pemesanan->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $pemesanan->nextPageUrl() }}" aria-label="Next">
                                            <i class="bi bi-chevron-compact-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                </div>
            </div>
        </div>
        <!-- Table End -->
    </div>
@endsection
