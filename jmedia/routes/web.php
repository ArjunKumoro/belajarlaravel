<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\MalasngodingController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\DikiController;


// HOME
Route::get('/', function () {
    return view('home');
});

// BLOG
Route::get('/blog', [BlogController::class, 'home']);
Route::get('/blog/tentang', [BlogController::class, 'tentang']);
Route::get('/blog/kontak', [BlogController::class, 'kontak']);

// DOSEN
Route::get('/dosen', [DosenController::class, 'index']);

// PEGAWAI CRUD
Route::get('/pegawai', [PegawaiController::class, 'index']);
Route::get('/pegawai/tambah', [PegawaiController::class, 'tambah']);
Route::post('/pegawai/store', [PegawaiController::class, 'store']);
Route::get('/pegawai/nama/{nama}', [PegawaiController::class, 'indexByName']);
Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit']);
Route::post('/pegawai/update', [PegawaiController::class, 'update']);
Route::get('/pegawai/hapus/{id}', [PegawaiController::class, 'hapus']);
Route::get('/pegawai/cari', [PegawaiController::class, 'cari']);

// FORMULIR LATIHAN
Route::get('/formulir', [PegawaiController::class, 'formulir']);
Route::post('/formulir/proses', [PegawaiController::class, 'proses']);

// VALIDASI
Route::get('/input', [MalasngodingController::class, 'input']);
Route::post('/proses', [MalasngodingController::class, 'proses']);

// GURU
Route::get('/guru', [GuruController::class, 'index']);
Route::get('/guru/hapus/{id}', [GuruController::class, 'hapus']);
Route::get('/guru/trash', [GuruController::class, 'trash']);
Route::get('/guru/hapus_permanen_semua', [GuruController::class, 'hapus_permanen_semua']);
Route::get('/guru/hapus_permanen/{id}', [GuruController::class, 'hapus_permanen']);
Route::get('/guru/kembalikan', [GuruController::class, 'kembalikan']);
Route::get('/guru/kembalikan/{id}', [GuruController::class, 'kembalikan']);

// PENGGUNA
Route::get('/pengguna', [PenggunaController::class, 'index']);

// ARTICLE
Route::get('/article', [WebController::class, 'index']);

// Diki Controller
Route::get('/anggota', [DikiController::class, 'index']);
