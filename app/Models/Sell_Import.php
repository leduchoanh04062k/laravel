<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell_Import extends Model
{
    use HasFactory;
    protected $table = 'sell_import';
    protected $primaryKey = 'id';
    protected $guarded = "";
}
