@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <!-- Form Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 ">
                    <div class="rounded h-100 p-4">
                        <h4 class="mb-4">Tambah Data</h4>
                        <form action="/pemesanan/{{ $pemesanan->id }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $pemesanan->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="lapangan_id">Lapangan</label>
                                <select name="lapangan_id" id="lapangan_id" class="form-control">
                                    @foreach($lapangan as $lapangan)
                                        <option data-harga="{{ $lapangan->harga }}" value="{{ $lapangan->id }}">{{ $lapangan->nama_lapangan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor Handphone</label>
                                <input type="text" name="no_hp" class="form-control" placeholder="Nomor Handphone" value="{{ $pemesanan->no_hp }}">
                            </div>
                            <div class="mb-3">
                                <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                                <input type="text" id="waktu_mulai" name="waktu_mulai" class="form-control datetimepicker" placeholder="Waktu Mulai" value="{{ $pemesanan->waktu_mulai }}">
                            </div>
                            <div class="mb-3">
                                <label for="waktu_akhir" class="form-label">Waktu Akhir</label>
                                <input type="text" id="waktu_akhir" name="waktu_akhir" class="form-control datetimepicker" placeholder="Waktu Akhir" value="{{ $pemesanan->waktu_akhir }}">
                            </div>
                            <div class="mb-3">
                                <label for="total_harga" class="form-label">Total Harga</label>
                                <input type="text" id="total_harga" name="total_harga" class="form-control" value="{{ $pemesanan->total_harga }}" readonly>
                            </div>                            
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select id="status" class="form-control" name="status">
                                    <option selected>Choose...</option>
                                    <option>Menunggu Verifikasi</option>
                                    <option>Sukses</option>
                                    <option>Gagal</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form End -->
    </div>
    <!-- Memuat Moment.js terlebih dahulu -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <!-- Memuat Bootstrap dan plugin datetimepicker setelah Moment.js dan jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.datetimepicker').datetimepicker({
                format: 'YYYY-MM-DD HH:mm',
                locale: 'en',
                sideBySide: true,
                icons: {
                    up: 'fas fa-chevron-up',
                    down: 'fas fa-chevron-down',
                    previous: 'fas fa-chevron-left',
                    next: 'fas fa-chevron-right'
                },
                stepping: 10
            });

            document.getElementById('lapangan_id').addEventListener('change', function() {
                updateTotalHarga();
            });

            document.getElementById('waktu_mulai').addEventListener('change', function() {
                updateTotalHarga();
            });

            document.getElementById('waktu_akhir').addEventListener('change', function() {
                updateTotalHarga();
            });

            function updateTotalHarga() {
                var lapanganSelect = document.getElementById('lapangan_id');
                var harga = parseFloat(lapanganSelect.options[lapanganSelect.selectedIndex].getAttribute('data-harga')) || 0;
                var waktuMulai = moment(document.getElementById('waktu_mulai').value, 'YYYY-MM-DD HH:mm');
                var waktuAkhir = moment(document.getElementById('waktu_akhir').value, 'YYYY-MM-DD HH:mm');

                // Validasi waktu mulai kurang dari waktu akhir
                if (waktuMulai >= waktuAkhir) {
                    alert("Waktu mulai harus sebelum waktu akhir.");
                    return;
                }

                var selisihJam = waktuAkhir.diff(waktuMulai, 'hours', true);
                var totalHarga = harga * selisihJam;

                document.getElementById('total_harga').value = totalHarga.toFixed(2);
            }

            // Pastikan perhitungan awal saat halaman dimuat
            updateTotalHarga();
        });
    </script>
@endsection
