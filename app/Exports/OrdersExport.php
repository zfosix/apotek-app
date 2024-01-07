<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection() // mengambil data 
    {
        return Order::with('user')->get(); // ambil data dari database
    }

    public function headings(): array // mengasih nama kolom di paling atas excel
    {
        return [
            "Nama Pembeli", "Obat", "Total Bayar", "Kasir", "Tanggal"
        ];
    }

    public function map($item): array // buatkan nge styling excel
    {
        $dataObat = '';
        foreach ($item->medicines as $value) {
            $format = $value['name_medicine'] . " (qty " . $value['qty'] . ") : Rp. " . number_format($value['sub_price']) . "),";
            $dataObat .= $format;
        }

        return [
            $item->nama_customer,
            $dataObat,
            $item->total_price,
            $item->user->name,
            \Carbon\Carbon::parse($item->created_at)->isoFormat($item->created_at),
        ];
    }
}