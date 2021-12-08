<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
	use HasFactory;
	protected $table = "warehouses";
	protected $primaryKey = "id";
	protected $guarded = "";

	public function customers()
	{
		return $this->belongsTo('App\Models\Customer','customer_id','id');
	}
}
