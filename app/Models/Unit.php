<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = ['stock_id', 'unit', 'exchange', 'price_sell','useforsale','outofstock','barcode', 'qty'];

    public function stock()
    {
        return $this->hasOne('App\Models\Stock', 'id');
    }
}
