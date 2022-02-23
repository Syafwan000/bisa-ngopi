<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AllTransaksiExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaksi::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Pelanggan',
            'Nama Menu',
            'Jumlah',
            'Total Harga',
            'Nama Pegawai',
            'Tanggal Transaksi',
            'Tanggal Edit Transaksi'
        ];
    }
}
