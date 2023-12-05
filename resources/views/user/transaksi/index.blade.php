@extends('user.layout.app')
@section('content')
    <!-- Hero Start -->
    <div class="container-fluid bg-primary hero-header mb-5">
        <div class="container text-center">
            <h1 class="display-4 text-white mb-3 animated slideInDown">Riwayat Transaksi</h1>
        </div>
    </div>
    <!-- Hero End -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h2 class="text-primary mb-3"><span class="fw-light text-dark">Reservasi</span> Lapangan</h2>
                <p class="mb-5">Nikmati keseruan bermain badminton dengan fasilitas lapangan terbaik</p>
            </div>

            @if ($reservasi->isEmpty())
                <!-- Display reservation button if there are no transactions -->
                <div class="text-center">
                    <a href="{{ route('pemesanan') }}" class="btn btn-primary">Reservasi Sekarang</a>
                </div>
            @else
                <!-- Display transaction history table with margin -->
                <table class="table table-striped table-with-margin">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Lapangan</th>
                            <th scope="col">Waktu Mulai</th>
                            <th scope="col">Waktu Akhir</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($reservasi as $item)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $item->lapangan->nama_lapangan }}</td>
                                <td>{{ $item->waktu_mulai }}</td>
                                <td>{{ $item->waktu_akhir }}</td>
                                <td>{{ $item->total_harga }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary m-2"
                                        onclick="checkStatusAndPrintReceipt('{{ $item->status }}')">
                                        <i class="fas fa-receipt" style="color: white;"></i> Print Receipt
                                    </button>

                                    <!-- Modal for non-successful status -->
                                    <div class="modal fade" id="notaNotAvailableModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    <div class="container-fluid newsletter bg-primary py-5 my-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-white mb-3"><span class="fw-light text-dark">Member</span></h1>
    
                @if($member->isEmpty())
                    <!-- Display registration prompt if the user is not a member -->
                    <p class="text-white mb-4">Daftarkan diri anda segera</p>
                    <a href="/member/create" class="btn btn-light">Daftar Sekarang</a>
                @else
                <p>Anda telah terdaftar sebagai member dengan masa berlaku :</p>
                    <!-- Display membership information if the user is a member -->
                    @foreach ($member as $m)
                        <h2 class="text-white">{{ $m->tgl_mulai }} - {{ $m->tgl_akhir }}</h2>
                        <!-- Add additional information from the $m object as needed -->
                    @endforeach
                @endif
            </div>
            <div class="row justify-content-center">
                <!-- Additional content for the row -->
            </div>
        </div>
    </div>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <style>
        .table-with-margin {
            margin-top: 20px;
            /* Adjust the margin as needed */
        }
    </style>
    <script>
        function checkStatusAndPrintReceipt(status) {
            if (status === 'Sukses') {
                window.location.href = "/transaksi/{{ $item->id }}/nota";
            } else {
                $('#notaNotAvailableModal').modal('show');
            }
        }
    </script>
@endsection
