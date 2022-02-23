<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .title {
            text-align: center;
        }
    </style>
    <title>Semua Data Transaksi</title>
</head>
<body>
    <div class="container">
        <h3 style="text-align: center">BisaNgopi</h3>
        <p><b>Nama Pegawai</b> : {{ $nama_pegawai }}</p>
        <p><b>Role</b> : {{ $role }}</p>
        <p class="title"><b>Semua Data Transaksi</b></p>
    </div>
    <div class="container">
        <table class="table" border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Menu</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Nama Pegawai</th>
                    <th>Tanggal Transaksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis as $transaksi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaksi->nama_pelanggan }}</td>
                        <td>{{ $transaksi->nama_menu }}</td>
                        <td>{{ number_format($transaksi->jumlah) }}</td>
                        <td>Rp {{ number_format($transaksi->total_harga) }}</td>
                        <td>{{ $transaksi->nama_pegawai }}</td>
                        <td>{{ $transaksi->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>