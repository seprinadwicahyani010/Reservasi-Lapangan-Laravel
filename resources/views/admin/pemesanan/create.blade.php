@extends('layouts.admin')
@section('content')
    <div class="container">
        <!-- Form Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="bg-light rounded h-100 p-4">
                <div class="col-sm-12 ">
                    <div class="rounded h-100 p-4">
                        <h4 class="mb-4">Tambah Data</h4>
                        <form action="{{ route('pemesanan.admin.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="lapangan_id">Lapangan <span class="text-danger">*</span></label>
                                <select name="lapangan_id" id="lapangan_id" class="form-control" required>
                                    @foreach($lapangan as $lapangan)
                                        <option data-harga="{{ $lapangan->harga }}" value="{{ $lapangan->id }}">{{ $lapangan->nama_lapangan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor Handphone <span class="text-danger">*</span></label>
                                <input type="tel" name="no_hp" class="form-control" max="13" placeholder="ex : 08xxxxxxxxxxx" required pattern="[0-9]{10,13}">
                            </div>
                            <div class="mb-3">
                                <label for="waktu_mulai" class="form-label">Waktu Mulai <span class="text-danger">*</span></label>
                                <input type="datetime-local" id="waktu_mulai" name="waktu_mulai" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="waktu_akhir" class="form-label">Waktu Akhir <span class="text-danger">*</span></label>
                                <input type="datetime-local" id="waktu_akhir" name="waktu_akhir" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="total_harga" class="form-label">Total Harga <span class="text-danger">*</span></label>
                                <input type="text" id="total_harga" name="total_harga" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select id="status" class="form-control" name="status" required>
                                    <option selected>Choose...</option>
                                    <option>Menunggu Verifikasi</option>
                                    <option>Sukses</option>
                                    <option>Batal</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- Form End -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

    <script>
        $(document).ready(function() {
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

            updateTotalHarga();
        });
    </script>
@endsection
