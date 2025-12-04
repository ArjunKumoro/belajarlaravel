<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Pegawai;

class PdfController extends Controller
{
    public function generate()
    {
        // Setup Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Helvetica');
        $options->set('isRemoteEnabled', true); // kalau ada asset online
        $dompdf = new Dompdf($options);

        // Ambil data pegawai
        $pegawais = Pegawai::all();

        // Load view khusus PDF
        $html = view('pegawai_pdf', compact('pegawais'))->render();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // **Stream PDF ke browser sebagai preview** (Attachment=false)
        return $dompdf->stream('pegawai.pdf', ["Attachment" => false]);
    }
}
