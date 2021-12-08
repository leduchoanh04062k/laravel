<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LotNo extends Model
{
    use HasFactory;
    protected $fillable = ['stock_id', 'lot_no', 'exp_date', 'price_import',];
}
