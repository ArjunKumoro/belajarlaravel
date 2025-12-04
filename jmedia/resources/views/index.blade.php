<!DOCTYPE html>
<html>
<head>
	<title>Data Pegawai</title>

	<!-- BOOTSTRAP 5 CDN -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="container py-4">

	<h2><a href="https://www.malasngoding.com">www.malasngoding.com</a></h2>
	<h3 class="mb-4">Data Pegawai</h3>

	<!-- Tombol Tambah Data -->
	<div class="mb-3">
		<a href="/pegawai/tambah" class="btn btn-success">+ Tambah Pegawai</a>
	</div>

	<!-- FORM CARI -->
	<form action="/pegawai/cari" method="GET" class="d-flex gap-2 mb-4">
		<input type="text" name="cari" class="form-control w-25"
			   placeholder="Cari Pegawai .." value="{{ old('cari') }}">
		<button class="btn btn-primary">CARI</button>
	</form>

	<!-- TABLE -->
	<table class="table table-bordered table-striped">
		<thead class="table-dark">
			<tr>
				<th>Nama</th>
				<th>Jabatan</th>
				<th>Umur</th>
				<th>Alamat</th>
				<th width="160px">Aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pegawai as $p)
			<tr>
				<td>{{ $p->pegawai_nama }}</td>
				<td>{{ $p->pegawai_jabatan }}</td>
				<td>{{ $p->pegawai_umur }}</td>
				<td>{{ $p->pegawai_alamat }}</td>
				<td>
					<a href="/pegawai/edit/{{ $p->pegawai_id }}" class="btn btn-warning btn-sm">Edit</a>
					<a href="/pegawai/hapus/{{ $p->pegawai_id }}" 
					   onclick="return confirm('Yakin hapus data ini?')"
					   class="btn btn-danger btn-sm">Hapus</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<!-- Info Pagination -->
	<div class="mb-3">
		Halaman : {{ $pegawai->currentPage() }} <br>
		Jumlah Data : {{ $pegawai->total() }} <br>
		Data Per Halaman : {{ $pegawai->perPage() }}
	</div>

	<!-- PAGINATION BOOTSTRAP -->
	{{ $pegawai->links('pagination::bootstrap-5') }}

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
