<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuuLichSuInMaVach extends Model
{
    use HasFactory;
    protected $table = "luu_lich_su_in_ma_vaches";
	protected $primaryKey = "id";
	protected $guarded = "";
}
