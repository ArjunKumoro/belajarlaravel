<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DikiController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\TesController;
use App\Http\Controllers\NotifController;
use App\Http\Controllers\MalasngodingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Models\Pegawai;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\HaloController;


// PUBLIC ROUTES

Route::get('/', function () {
    return view('welcome');
});

// ROUTE KIRIM EMAIL & MALASNODING
Route::get('/malasngoding/{nama}', [MalasngodingController::class, 'index']);
Route::get('/kirimemail', [MalasngodingController::class, 'index']);

// DASHBOARD & AUTH ROUTES

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Laravel auth routes (Breeze / Jetstream)
require __DIR__.'/auth.php';

// DIKI CONTROLLER ROUTES

Route::get('/enkripsi', [DikiController::class, 'enkripsi']);
Route::get('/data', [DikiController::class, 'data']);
Route::get('/data/{data_rahasia}', [DikiController::class, 'data_proses']);
Route::get('/hash', [DikiController::class, 'hash']);

// UPLOAD CONTROLLER ROUTES

Route::get('/upload', [UploadController::class, 'upload']);
Route::post('/upload/proses', [UploadController::class, 'proses_upload']);
Route::get('/upload/hapus/{id}', [UploadController::class, 'hapus']);

// SESSION / TES CONTROLLER

Route::get('/session/tampil', [TesController::class, 'tampilkanSession']);
Route::get('/session/buat', [TesController::class, 'buatSession']);
Route::get('/session/hapus', [TesController::class, 'hapusSession']);

// NOTIFIKASI CONTROLLER

Route::get('/pesan', [NotifController::class, 'index']);
Route::get('/pesan/sukses', [NotifController::class, 'sukses']);
Route::get('/pesan/peringatan', [NotifController::class, 'peringatan']);
Route::get('/pesan/gagal', [NotifController::class, 'gagal']);

// PDF
Route::get('/pegawai', function () {
    $pegawais = Pegawai::all();
    return view('pegawai', compact('pegawais'));
});

// Generate PDF
Route::get('/pegawai/pdf', [PdfController::class, 'generate']);
Route::get('/siswa/export', [SiswaController::class, 'export']);
Route::get('/siswa', function () {
    $siswa = \App\Models\Siswa::all();
    return view('siswa', compact('siswa'));
});
Route::get('/siswa/import', [SiswaController::class, 'importView']); // halaman import
Route::post('/siswa/import_excel', [SiswaController::class, 'importExcel']); // proses import

Route::get('/form', function () {
    return view('biodata');
});

// localization pilih bahasa
Route::get('/{locale}/form', function ($locale) {
    App::setLocale($locale);
    return view('biodata');
});


Route::get('halo/{nama}', [HaloController::class, 'halo']);
Route::get('halo', [HaloController::class, 'panggil']);