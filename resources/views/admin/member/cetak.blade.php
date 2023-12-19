<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h3 align='center'>Laporan Anggota Member</h3>
    <div class="text-center">
        <h6 style="margin-bottom: 5px;">Bencoolen Badminton</h6>
        <p>Jalan Meranti No.Raya Sawah Lebar Bengkulu 38221 Indonesia</p>
    </div>
    <hr>
    <table class="table table-bordered" align="center" rules="all" style="width: 95%" border="1px">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">No Handphone</th>
                <th scope="col">Masa Berlaku</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach ($cetakData as $member)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $member->nama }}</td>
                    <td>{{ $member->JK }}</td>
                    <td>{{ $member->alamat }}</td>
                    <td>{{ $member->no_hp }}</td>
                    <td>{{ $member->tgl_mulai }} - {{ $member->tgl_akhir }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
