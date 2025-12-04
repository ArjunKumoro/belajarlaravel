<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa - Export & Import Excel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <div class="text-center mb-4">
        <h2>Data Siswa</h2>
        <p>Laravel Excel Export & Import Example</p>
        <a href="{{ url('/siswa/export') }}" class="btn btn-success" target="_blank">EXPORT EXCEL</a>
        <a href="{{ url('/siswa/import') }}" class="btn btn-primary">IMPORT EXCEL</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Alamat</th>
            </tr>
            </thead>
            <tbody>
            @php $i = 1; @endphp
            @foreach($siswa as $s)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $s->nama }}</td>
                    <td>{{ $s->nis }}</td>
                    <td>{{ $s->alamat }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
