@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="bg-light rounded h-100 p-4">
                    <div class="col-12">
                        <h3 class="mb-4">Member</h3>
                        <div style="float: right;">
                            <form action="{{ route('member.admin.index') }}" method="GET" class="d-none d-md-flex">
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
                            <a href="/admin/member/create" style="color: white">
                                <i class="fas fa-plus-circle"></i> Tambah Data
                            </a>
                        </button>
                        <button type="button" class="btn btn-primary m-2">
                            <i class="fas fa-print"></i> 
                            <a href="/admin/dataMember" style="color: white; text-decoration: none;">Cetak Data</a>
                        </button>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive text-nowrap">
                            <table class="table table hover ">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">No Handphone</th>
                                        <th scope="col">Durasi</th>
                                        <th scope="col">Masa Berlaku</th>
                                        <th scope="col">Total Harga</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                $no = ($members->currentPage() - 1) * $members->perPage() + 1;
                                ?>
                                <tbody>
                                    @foreach ($members as $member)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $member->nama }}</td>
                                            <td>{{ $member->JK }}</td>
                                            <td>{{ $member->alamat }}</td>
                                            <td>{{ $member->no_hp }}</td>
                                            <td>{{ $member->durasi }} Bulan</td>
                                            <td>{{ $member->tgl_mulai }} - {{ $member->tgl_akhir }}</td>
                                            <td>Rp{{ number_format($member->total_biaya, 2, ',', '.') }}</td>
                                            <td>{{ $member->status }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary m-2"><a
                                                        href="/admin/member/{{ $member->id }}/update"
                                                        style="color: white">
                                                        <i class="fas fa-edit" style="color: white;"></i></a></button>
                                                <button type="button" class="btn btn-danger m-2"
                                                    onclick="showDeleteSuccessModal()">
                                                    <a href="/admin/member/{{ $member->id }}/delete"
                                                        style="color: white">
                                                        <i class="fas fa-trash-alt" style="color: white;"></i>
                                                    </a>
                                                </button>
                                                <button type="button" class="btn btn-success m-2"
                                                    onclick="checkStatusAndPrintReceipt('{{ $member->status }}', '{{ $member->id }}')">
                                                    <i class="fas fa-receipt" style="color: white;"></i>
                                                </button>

                                                <!-- Modal for non-successful status -->
                                                <div class="modal fade" id="notaNotAvailableModal" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Nota
                                                                    Tidak
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
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Data Berhasil
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
                        {{ $members->links() }}
                    </div>
                </div>
            </div>
            <!-- Table End -->
        </div>
        <script>
            function checkStatusAndPrintReceipt(status, memberId) {
                if (status === 'Aktif') {
                    window.location.href = `/admin/member/${memberId}/nota`;
                } else {
                    $('#notaNotAvailableModal').modal('show');
                }
            }
            function showDeleteSuccessModal() {
                $('#deleteSuccessModal').modal('show');
            }
        </script>
    @endsection
