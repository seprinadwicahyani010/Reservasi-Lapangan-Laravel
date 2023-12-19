@extends('layouts.admin')
@section('content')
    <div class="container">
        <!-- Form Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="bg-light rounded h-100 p-4">
                <div class="col-sm-12 ">
                    <div class=" rounded h-100 p-4">
                        <h4 class="mb-4">Edit Data</h4>
                        <form action="/admin/member/{{ $member->id }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $member->nama }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="JK" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select id="JK" class="form-control" name="JK" required>
                                    <option selected>Choose...</option>
                                    <option value="Laki-Laki" {{ $member->JK == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ $member->JK == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{ $member->alamat }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor Handphone <span class="text-danger">*</span></label>
                                <input type="tel" name="no_hp" class="form-control" placeholder="ex: 08xxxxxxxxxx" value="{{ $member->no_hp }}" required pattern="[0-9]{10,13}">
                            </div>
                            <div class="mb-3">
                                <label for="durasi" class="form-label">Durasi <span class="text-danger">*</span></label>
                                <input type="text" id="durasi" name="durasi" class="form-control" min="1" placeholder="ex: 1" value="{{ $member->durasi }}" required pattern="[0-9]">
                            </div>
                            <div class="mb-3">
                                <label for="total_biaya" class="form-label">Total Harga <span class="text-danger">*</span></label>
                                <input type="text" id="total_biaya" name="total_biaya" class="form-control" value="{{ $member->total_biaya }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select id="status" class="form-control" name="status" required>
                                    <option value="{{ $member->status }}" selected></option>
                                    <option value="Menunggu Verifikasi" {{ $member->status == 'Menunggu Verifikasi' ? 'selected' : '' }}>Menunggu Verifikasi</option>
                                    <option value="Aktif" {{ $member->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Tidak Aktif" {{ $member->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit Data</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- Form End -->
    </div>
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
