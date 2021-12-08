<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockGroup extends Model
{
    use HasFactory;
    protected $table = "stock_group";
    protected $primaryKey="id";
    protected $guarded=""; 
}
