<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnSupplier extends Model
{
    use HasFactory;
    protected $table = 'return_to_suppliers';
    protected $primaryKey = 'id';
    protected $guarded="";

}