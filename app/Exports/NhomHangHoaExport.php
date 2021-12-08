<?php

namespace App\Exports;

use App\Models\StockGroup;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class NhomHangHoaExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return StockGroup::all();
    }

    public function headings():array{
    	return[
    		'#',
    		'Mã nhóm',
    		'Nhóm hàng hóa',
    		'Ghi chú',
    		'Trạng thái',
    		'Ngày đăng',
    		'Ngày cập nhập'
    	];
    }

    public function registerEvents(): array
    {
    	return [
    		AfterSheet::class    => function(AfterSheet $event) {
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
