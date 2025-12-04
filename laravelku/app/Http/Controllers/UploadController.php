<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gambar; 
use File;

class UploadController extends Controller
{
    public function upload(){
        $gambar = Gambar::get();
        return view('upload', ['gambar' => $gambar]);
    }

    public function proses_upload(Request $request){
        $request->validate([
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'keterangan' => 'required',
        ]);

        // ambil file
        $file = $request->file('file');

        // buat nama file baru
        $nama_file = time() . "_" . $file->getClientOriginalName();

        // folder tujuan upload
        $tujuan_upload = 'data_file';

        // upload file
        $file->move($tujuan_upload, $nama_file);

        // simpan ke database
        Gambar::create([
            'file' => $nama_file,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back();
    }

    public function hapus($id){
	// hapus file
	$gambar = Gambar::where('id',$id)->first();
	File::delete('data_file/'.$gambar->file);
 
	// hapus data
	Gambar::where('id',$id)->delete();
 
	return redirect()->back();
    }
}
