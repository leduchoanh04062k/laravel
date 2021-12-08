<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierImportReturn extends Model
{
    use HasFactory;
    protected $fillable = ['supplier_id', 'code', 'name', 'lot_no', 'exp_date','unit', 'qty', 'price', 'discount', 'VAT','price_import','total' ];
    // protected $table = "supplier_import_returns";
    protected $primaryKey="id";
    protected $guarded="";
}
