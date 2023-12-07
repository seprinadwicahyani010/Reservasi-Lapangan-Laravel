@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="bg-light rounded h-100 p-4">
                    <div class="col-12">
                        <h3 class="mb-4">Lapangan</h3>
                        <div style="float: right;">
                            <form action="{{ route('lapangan.index') }}" method="GET" class="d-none d-md-flex">
                                <div class="input-group">
                                    <input class="form-control border rounded-0" type="search" placeholder="Search"
                                        name="search" style="max-width: 250px; max-height: 50px;">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <button type="button" class="btn btn-primary m-2"><a href="/lapangan/create"
                                style="color: white">Tambah Data</a></button>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive text-nowrap">
                            <table class="table table hover ">
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
                                                <img src="{{ asset('Gambar Lapangan') . '/' . $item->gambar }}"
                                                    alt="" class="img-fluid" width="100">
                                            </td>
                                            <td>{{ $item->nama_lapangan }}</td>
                                            <td>Rp{{ number_format($item->harga, 2, ',', '.') }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary m-2"><a
                                                        href="/lapangan/{{ $item->id }}/update" style="color: white">
                                                        <i class="fas fa-edit" style="color: white;"></i></a></button>
                                                <button type="button" class="btn btn-danger m-2" onclick="showDeleteSuccessModal()"><a
                                                        href="/lapangan/{{ $item->id }}/delete" style="color: white"><i
                                                            class="fas fa-trash-alt" style="color: white;"></i></a></button>
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
                    </div>
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
