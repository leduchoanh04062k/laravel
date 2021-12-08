<?php

namespace App\Exports;


use App\Models\PaymenReceipt;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SoquyExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return PaymenReceipt::all();
    }
    //Thêm hàng tiêu đề cho bảng
    public function headings(): array
    {
        return ["STT", "Thời gian", "Loại thu/chi", "Người nộp/nhận", "Giá trị", "Trạng thái"];
    }
}
