@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="bg-light rounded h-100 p-4">
                    <div class="col-12">
                        <h3 class="mb-4">Kursus</h3>
                        <div style="float: right;">
                            <form action="{{ route('kursus.admin.index') }}" method="GET" class="d-none d-md-flex">
                                <div class="input-group">
                                    <input class="form-control border rounded-0" wire:mode.live="search"
                                        placeholder="Search" name="search" style="max-width: 250px; max-height: 50px;">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <button type="button" class="btn btn-primary m-2">
                            <i class="bi bi-plus"></i>
                            <a href="/admin/kursus/create" style="color: white; text-decoration: none;">Tambah Data</a>
                        </button>

                        <button type="button" class="btn btn-primary m-2">
                            <i class="fas fa-print"></i> 
                            <a href="/admin/dataKursus" style="color: white; text-decoration: none;">Cetak Data</a>
                        </button>

                    </div>
                    <div class="col-12">
                        <div class="table-responsive text-nowrap">
                            <table class="table table hover ">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Tanggal Lahir</th>
                                        <th scope="col">Umur</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">No Handphone</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                $no = ($kursus->currentPage() - 1) * $kursus->perPage() + 1;
                                ?>
                                <tbody>
                                    @foreach ($kursus as $item)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->tgl_lahir }}</td>
                                            <td>{{ $item->umur }} Tahun</td>
                                            <td>{{ $item->JK }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->no_hp }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary m-2"><a
                                                        href="/admin/kursus/{{ $item->id }}/update"
                                                        style="color: white"><i class="fas fa-edit"
                                                            style="color: white;"></i></a></button>
                                                <button type="button" class="btn btn-danger m-2" onclick="showDeleteSuccessModal()"><a
                                                        href="/admin/kursus/{{ $item->id }}/delete"
                                                        style="color: white"><i class="fas fa-trash-alt"
                                                            style="color: white;"></i></a></button>
                                                <!-- Modal for successful delete -->
                                                <div class="modal fade" id="deleteSuccessModal" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Data Berhasil
                                                                    Dihapus</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Data berhasil dihapus.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br>
                        {{ $kursus->links() }}
                    </div>

                </div>
            </div>
            <!-- Table End -->
        </div>
        <script>
            function showDeleteSuccessModal() {
                $('#deleteSuccessModal').modal('show');
            }
        </script>
    @endsection
