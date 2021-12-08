<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockPrice extends Model
{
    use HasFactory;
    // protected $fillable = ['price_id', 'code', 'name', 'unit', 'price_old', 'price_new'];
    protected $table = "stock_prices";
    protected $primaryKey="id";
    protected $guarded="";
}
