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
    <title>Data Menu</title>
</head>
<body>
    <div class="container">
        <h3 style="text-align: center">BisaNgopi</h3>
        <p><b>Nama Pegawai</b> : {{ $nama_pegawai }}</p>
        <p><b>Role</b> : {{ $role }}</p>
        <p class="title"><b>Data Menu</b></p>
    </div>
    <div class="container">
        <table class="table" border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Ketersediaan</th>
                    <th>Tanggal Transaksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $menu->nama_menu }}</td>
                        <td>Rp {{ number_format($menu->harga) }}</td>
                        <td>{{ $menu->deskripsi }}</td>
                        <td>{{ number_format($menu->ketersediaan) }}</td>
                        <td>{{ $menu->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>