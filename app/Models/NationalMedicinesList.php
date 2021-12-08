<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NationalMedicinesList extends Model
{
	use HasFactory;
	protected $table = 'national_medicines_list';
	protected $primaryKey = 'id';
	protected $guarded = [];
}
