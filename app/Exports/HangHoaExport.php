<?php

namespace App\Exports;

use App\Models\Stock;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;


class HangHoaExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Stock::all();
    }

    public function headings(): array
    {
        return [
            "#",
            "Mã HH",
            "Tên HH",
            "Số đăng kí",
            "Hoạt chất chính",
            "Hàm lượng",
            "Quy cách đóng gói",
            "Hãng sản suất",
            "Nước sản suất",
            "Giá vốn",
            "Giá bán",
            "Tổng tồn"
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:W1';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

    public function columnFormats(): array
    {
        return [
            'Q' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'R' => NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE,
        ];
    }
}