<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MalasngodingController extends Controller
{
    public function input()
    {
        return view('input'); // nama file blade
    }

    public function proses(Request $request)
    {
        // VALIDASI FORM
        $validated = $request->validate([
            'nama'       => 'required|alpha',
            'pekerjaan'  => 'required|alpha_num',
            'usia'       => 'required|numeric|min:1|max:120',
        ]);

        // Jika validasi lolos, lanjut proses
        return "Data berhasil diproses!";
    }
}
