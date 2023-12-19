@extends('layouts.admin')
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
                                    <input class="form-control border rounded-0" type="search" placeholder="Search"
                                        name="search" style="max-width: 250px; max-height: 50px;">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <button type="button" class="btn btn-primary m-2">
                            <i class="fas fa-plus-circle"></i> 
                            <a href="/admin/pemesanan/create" style="color: white; text-decoration: none;">Tambah Data</a>
                        </button>

                        <button type="button" class="btn btn-primary m-2" id="cetakButton">
                            <i class="fas fa-print"></i> 
                            Cetak Data
                        </button>

                        <!-- Modal structure -->
                        <div class="modal fade" id="cetakModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cetak Data</h5>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form inside the modal -->
                                        <form action="{{ route('cetak') }}" method="post">
                                            @csrf
                                            <label for="start_date">Start Date:</label>
                                            <input type="date" name="start_date" required>

                                            <label for="end_date">End Date:</label>
                                            <input type="date" name="end_date" required>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Cetak</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12">
                        <div class="table-responsive text-nowrap">
                            <table class="table table hover ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Lapangan</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>No Handphone</th>
                                        <th>Waktu Mulai</th>
                                        <th>Waktu Akhir</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php $no = ($pemesanan->currentPage() - 1) * $pemesanan->perPage() + 1; ?>
                                    @foreach ($pemesanan as $item)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->lapangan->nama_lapangan }}</td>
                                            <td>{{ $item->tgl_pemesanan }}</td>
                                            <td>{{ $item->no_hp }}</td>
                                            <td>{{ $item->waktu_mulai }}</td>
                                            <td>{{ $item->waktu_akhir }}</td>
                                            <td>Rp{{ number_format($item->total_harga, 2, ',', '.') }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary m-2"><a
                                                        href="/admin/pemesanan/{{ $item->id }}/update"
                                                        style="color: white"><i class="fas fa-edit"
                                                            style="color: white;"></i></a></button>
                                                <button type="button" class="btn btn-danger m-2"
                                                    onclick="showDeleteSuccessModal()"><a
                                                        href="/admin/pemesanan/{{ $item->id }}/delete"
                                                        style="color: white"><i class="fas fa-trash-alt"
                                                            style="color: white;"></i></a></button>
                                                <button type="button" class="btn btn-success m-2"
                                                    onclick="checkStatusAndPrintReceipt('{{ $item->status }}', '{{ $item->id }}')">
                                                    <i class="fas fa-receipt" style="color: white;"></i>
                                                </button>

                                                <!-- Modal for non-successful status -->
                                                <div class="modal fade" id="notaNotAvailableModal" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Nota Tidak
                                                                    Tersedia</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Maaf, nota tidak tersedia untuk pesanan ini.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal for successful delete -->
                                                <div class="modal fade" id="deleteSuccessModal" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Data
                                                                    Berhasil
                                                                    Dihapus</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
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
                        {{ $pemesanan->links() }}
                    </div>
                </div>
            </div>
            <!-- Table End -->
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <script>
            // JavaScript to open the modal when the button is clicked
            $(document).ready(function() {
                $('#cetakButton').click(function() {
                    $('#cetakModal').modal('show');
                });
            });
        </script>
        <script>
            function checkStatusAndPrintReceipt(status, pemesananId) {
                if (status === 'Sukses') {
                    window.location.href = `/admin/pemesanan/${pemesananId}/nota`;
                } else {
                    $('#notaNotAvailableModal').modal('show');
                }
            }
            function showDeleteSuccessModal() {
                $('#deleteSuccessModal').modal('show');
            }
        </script>
    @endsection
