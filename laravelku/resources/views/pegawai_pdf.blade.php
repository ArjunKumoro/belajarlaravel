<!DOCTYPE html>
<html>
<head>
    <title>Data Pegawai</title>
    <style>
    body { font-family: Helvetica, sans-serif; font-size: 12px; }
    table { width: 100%; border-collapse: collapse; table-layout: fixed; }
    th, td { border: 1px solid #000; padding: 5px; word-wrap: break-word; }
    th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Data Pegawai</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Pekerjaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pegawais as $pegawai)
            <tr>
                <td>{{ $pegawai->id }}</td>
                <td>{{ $pegawai->nama }}</td>
                <td>{{ $pegawai->email }}</td>
                <td>{{ $pegawai->alamat }}</td>
                <td>{{ $pegawai->telepon }}</td>
                <td>{{ $pegawai->pekerjaan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
