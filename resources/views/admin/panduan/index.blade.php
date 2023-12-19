@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="bg-light rounded h-100 p-4">
                    <div class="col-12">
                        <h3 class="mb-4">Panduan</h3>
                        <div style="float: right;">
                            <form action="{{ route('panduan.index') }}" method="GET" class="d-none d-md-flex">
                                <div class="input-group">
                                    <input class="form-control border rounded-0" type="search" placeholder="Search" name="search" style="max-width: 250px; max-height: 50px;">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <button type="button" class="btn btn-primary m-2"><a href="/panduan/create" style="color: white">Tambah Data</a></button>
                    </div>
                <div class="col-12">
                        <div class="table-responsive text-nowrap">
                            <table class="table table hover " >
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = ($panduan->currentPage() - 1) * $panduan->perPage() + 1; ?>
                                    @foreach ($panduan as $item)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td>
                                                <a href="/panduan/{{ $item->id }}/update" class="btn btn-primary m-2" style="text-decoration: none;">
                                                    <i class="fas fa-edit" style="color: white;"></i>
                                                </a>
                                                <a href="/panduan/{{ $item->id }}/delete" class="btn btn-danger m-2" onclick="showDeleteSuccessModal()" style="text-decoration: none;">
                                                    <i class="fas fa-trash-alt" style="color: white;"></i>
                                                </a>
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
                    {{ $panduan->links() }}
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
