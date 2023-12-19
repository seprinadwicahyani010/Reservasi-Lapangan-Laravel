<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Pembayaran</title>
    <style>
        * {
            font-family: "consolas", sans-serif;
        }

        p {
            display: block;
            margin: 3px;
            font-size: 10pt;
        }

        table td {
            font-size: 9pt;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        @media print {
            @page {
                margin: 0;
                size: 75mm 105mm; 
            }

            html, body {
                width: 70mm;
            }

            .btn-print {
                display: none;
            }
        }
    </style>
</head>

<body onload="window.print()">
    <button class="btn-print" style="position: absolute; right: 1rem; top: rem;" onclick="window.print()">Print</button>
    <div class="text-center">
        <h3 style="margin-bottom: 5px;">Bencoolen Badminton</h3>
        <p>Jalan Meranti No.Raya Sawah Lebar Bengkulu 38221 Indonesia</p>
    </div>
    <br>
    <div>
        <p style="float: left;">{{ $pemesanan->tgl_pemesanan }}</p>
        <p style="float: right">{{ $pemesanan->nama }}</p>
    </div>
    <div class="clear-both" style="clear: both;"></div>
    <p>No: 000{{ $pemesanan->id, 10  }}</p>
    <p class="text-right">===================================</p>

    <br>
    <table width="100%" style="border: 0;">
        <tr>
            <td>Lapangan:</td>
            <td></td>
            <td class="text-right">{{ $pemesanan->lapangan->nama_lapangan }}</td>
        </tr>
        <tr>
            <td>Waktu Mulai:</td>
            <td></td>
            <td class="text-right">{{ $pemesanan->waktu_mulai }}</td>
        </tr>
        <tr>
            <td>Waktu Akhir:</td>
            <td></td>
            <td class="text-right">{{ $pemesanan->waktu_akhir }}</td>
        </tr>
    </table>
    <p class="text-right">-----------------------------------</p>

    <table width="100%" style="border: 0;">
        <tr>
            <td>Total Harga:</td>
            <td class="text-right">Rp{{ number_format($pemesanan->total_harga, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Total Pembayaran:</td>
            <td class="text-right">Rp{{ number_format($pemesanan->total_harga, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Diterima:</td>
            <td class="text-right">Rp{{ number_format($pemesanan->total_harga, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Kembali:</td>
            <td class="text-right">Rp{{ number_format($pemesanan->total_harga - $pemesanan->total_harga) }}</td>
        </tr>
    </table>

    <p class="text-rigth">===================================</p>
    <p class="text-center">-- TERIMA KASIH --</p>

    <script>
        let body = document.body;
        let html = document.documentElement;
        let height = Math.max(
            body.scrollHeight, body.offsetHeight,
            html.clientHeight, html.scrollHeight, html.offsetHeight
        );

        document.cookie = "innerHeight=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "innerHeight=" + ((height + 50) * 0.264583);
    </script>
</body>

</html>
