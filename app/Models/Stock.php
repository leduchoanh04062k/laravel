<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stock';
    protected $primaryKey = 'id';
    protected $guarded=""; 

    public function unit()
	{
		return $this->belongsTo('App\Models\Unit', 'stock_id');
	}
}