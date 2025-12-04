<?php

namespace App\Models; // HARUS namespace ini

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = "pegawai"; // agar tidak otomatis jadi pegawais
    protected $fillable = ['nama','email','alamat','telepon','pekerjaan'];
}
