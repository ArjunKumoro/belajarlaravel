<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pegawai</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h1>Daftar Pegawai</h1>
    <a href="/pegawai/pdf" class="btn btn-primary mb-3">Cetak PDF</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Pekerjaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pegawais as $index => $pegawai)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pegawai->nama }}</td>
                    <td>{{ $pegawai->email }}</td>
                    <td>{{ $pegawai->alamat }}</td>
                    <td>{{ $pegawai->telepon }}</td>
                    <td>{{ $pegawai->pekerjaan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
