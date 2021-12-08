<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customer";
    protected $primaryKey = "id";
    protected $guarded = "";

    public function returnFromCustomer()
    {
    	return $this->hasMany('App\Models\CustomerImportCustomer','idcustomer','id');
    }

    public function warehouses()
    {
    	return $this->hasMany('App\Models\Warehouse','customer_id','id');
    }

    public function receipts()
    {
    	return $this->hasMany('App\Models\Sell_Import','idcustomer','id');
    }
}