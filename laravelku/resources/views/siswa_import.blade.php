<!DOCTYPE html>
<html>
<head>
    <title>Import Excel Siswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h3 class="my-3">Import Data Siswa dari Excel</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ url('/siswa/import_excel') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Pilih file Excel (.xlsx / .xls)</label>
            <input type="file" name="file" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Import</button>
        <a href="{{ url('/siswa') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
