<?php

namespace App\Exports;

use App\Models\ReturnCustomer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class KhachhangtlExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ReturnCustomer::all();
    }
    public function headings(): array
    {
        return [
            '#',
            'STT',
            'Mã phiếu',
            'Ngày tạo',
            'Tên khách hàng',
            'Mã hàng hóa',
            'Hàng hóa',
            'Số lô',
            'Ngày sản xuất',
            'Hạn sử dụng',
            'Số lượng',
            'Đơn vị tính',
            'Đơn giá',
            'Thành tiền',
            'Trạng thái',
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