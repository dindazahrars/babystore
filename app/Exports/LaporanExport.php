<?php

namespace App\Exports;

use App\Laporan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LaporanExport implements FromView,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('laporan.export_excel',[
            'laporan' => Laporan::orderBy('created_at','DESC')->get()
        ]);
    }
}
