<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Penduduk;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function penduduk(){

        $data = Penduduk::all(); 
        view()->share('data', $data);
        $pdf = PDF::loadView('export', ['data' => $data])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('data-penduduk.pdf');
    }

    public function pendudukExcel(){
        $data = Penduduk::all();
    
        // Define the Excel export data
        $exportData = [];
    
        foreach ($data as $data) {
            $exportData[] = [
                'Nama' => $data->nama,
                'NIK'=>$data->nik,
                'Tanggal Lahir'=>$data->tgl_lahir,
                'Alamat' => $data->alamat,
                'Jenis Kelamin' => $data->jenis_kelamin,
            ];
        }
    
        // Export the data to Excel
        return Excel::download(new PendudukExport($exportData), 'data-penduduk.xlsx');

    }
}
