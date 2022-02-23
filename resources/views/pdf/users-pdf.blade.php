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
    <title>Data User</title>
</head>
<body>
    <div class="container">
        <h3 style="text-align: center">BisaNgopi</h3>
        <p><b>Nama Pegawai</b> : {{ $nama_pegawai }}</p>
        <p><b>Role</b> : {{ $role }}</p>
        <p class="title"><b>Data User</b></p>
    </div>
    <div class="container">
        <table class="table" border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Tanggal Dibuat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>