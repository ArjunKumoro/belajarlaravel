<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // Export Excel
    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'NIS');
        $sheet->setCellValue('D1', 'Alamat');

        // Data
        $siswa = Siswa::all();
        $row = 2;
        foreach ($siswa as $s) {
            $sheet->setCellValue('A'.$row, $s->id);
            $sheet->setCellValue('B'.$row, $s->nama);
            $sheet->setCellValue('C'.$row, $s->nis);
            $sheet->setCellValue('D'.$row, $s->alamat);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'data_siswa.xlsx';

        // Output ke browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        $writer->save('php://output');
        exit;
    }

    // Tampilkan halaman import
    public function importView()
    {
        return view('siswa_import'); // view nanti dibuat: siswa_import.blade.php
    }

    // Proses import file Excel
    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        // Lewat header (baris pertama)
        for ($i = 1; $i < count($rows); $i++) {
            // Pastikan nama dan NIS tidak kosong
            $nama = $rows[$i][1] ?? null;
            $nis = $rows[$i][2] ?? null;
            $alamat = $rows[$i][3] ?? null;

            if (!empty($nama) && !empty($nis)) {
                Siswa::create([
                    'nama' => $nama,
                    'nis' => $nis,
                    'alamat' => $alamat,
                ]);
            }
        }

        return redirect('/siswa')->with('success', 'Data berhasil diimport!');
    }
}
