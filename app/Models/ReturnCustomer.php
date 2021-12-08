<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnCustomer extends Model
{
    use HasFactory;
    protected $table = 'return_from_customer';
    protected $primaryKey = 'id';
    protected $guarded = [];
}