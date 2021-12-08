<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierImportSupplier extends Model
{
    use HasFactory;

    protected $fillable = [ 'idsupplier','name','pay_supplier','date','hour','note','totalpaid' ];

    public function warehouse()
    {
        return $this->hasOne('App\Models\Warehouse', 'supplier_id');
    }

}
