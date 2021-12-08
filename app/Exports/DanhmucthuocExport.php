<?php

namespace App\Exports;

use App\Models\NationalMedicinesList;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class DanhmucthuocExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return NationalMedicinesList::all();
    }
    public function headings(): array
    {
        return [
            '#',
            'Loại hàng hóa',
            'Tên hàng',
            'Số đăng ký',
            'Hoạt chất tính',
            'Hàm lượng',
            'Quy cách đóng gói',
            'Hãng sản xuất',
            'Nước sản xuất',
            'Đơn vị cơ bản',
            'Số lô',
            'Hạn sử dụng',
            'Số lượng',
            'Đơn vị nhập',
            'Giá trị quy đổi',
            'Giá bán',
            'VAT giá bán',
            'Giá nhập',
            'Giảm giá 1 ĐV',
            'VAT giá nhập',
            'Mã vạch',
            'Mã hàng hóa',
            'Mã dược quốc gia',
            'Nhóm hàng hóa',
            'Đơn vị tính bổ sung 1',
            'Giá trị quy đổi',
            'Giá bán',
            'Đơn vị tính bổ sung 2',
            'Giá trị quy đổi',
            'Giá bán',
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