<?php

namespace App\Imports;

use App\Models\SupplierGroup;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Validators\Failure;

class SupplierGroupImport implements ToCollection, WithStartRow, WithValidation, SkipsOnFailure, SkipsOnError
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    use Importable, SkipsErrors, SkipsFailures;
    public $rows;

    public function startRow(): int
    {
        return 2;
    }

    public function collection(Collection $collection)
    {
        $this->rows = $collection;
    }

    public function rules(): array
    {
        return [
            '1' => 'unique:supplier_group,name',
        ];
    }
    public function customValidationMessages()
    {
        return [
            '1.unique' => trans('Đã tồn tại nhóm nhà cung cấp hàng có cùng tên'),
        ];
    }
}
