<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockImport_sampleprescription extends Model
{
    use HasFactory;
    protected $table = 'stock_import_prescription';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
