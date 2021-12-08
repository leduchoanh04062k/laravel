<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerImportCustomer extends Model
{
    use HasFactory;
    protected $table = 'customer_import_customers';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
