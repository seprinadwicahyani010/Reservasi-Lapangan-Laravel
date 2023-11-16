@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <!-- Form Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 ">
                    <div class=" rounded h-100 p-4">
                        <h4 class="mb-4">Tambah Data</h4>
                        <form action="/member/{{ $member->id }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $member->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="JK" class="form-label">Jenis Kelamin</label>
                                <select id="JK" class="form-control" name="JK">
                                    <option selected>Choose...</option>
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{ $member->alamat }}">
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor Handphone</label>
                                <input type="text" name="no_hp" class="form-control" placeholder="Nomor Handphone" value="{{ $member->no_hp }}">
                            </div>
                            <div class="mb-3">
                                <label for="durasi" class="form-label">Durasi (perbulan)</label>
                                <input type="text" id="durasi" name="durasi" class="form-control" min="1" placeholder="Isi angka saja contoh 1" value="{{ $member->durasi }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="total_biaya" class="form-label">Total Harga</label>
                                <input type="text" id="total_biaya" name="total_biaya" class="form-control" value="{{ $member->total_biaya }}" readonly>
                            </div>                            
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select id="status" class="form-control" name="status">
                                    <option value="{{ $member->status }}" selected></option>
                                    <option>Menunggu Verifikasi</option>
                                    <option>Aktif</option>
                                    <option>Tidak Aktif</option>
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
    <!-- Pastikan Anda menyertakan jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Ketika nilai pada input durasi berubah
        $('#durasi').on('input', function () {
            // Ambil nilai durasi
            var durasi = $(this).val();

            // Hitung total biaya
            var totalBiaya = durasi * 300000;

            // Isi nilai total biaya ke input total_biaya
            $('#total_biaya').val(totalBiaya);
        });
    });
</script>

    
@endsection