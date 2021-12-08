<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quality extends Model
{
    use HasFactory;
    protected $table = 'periodic_qulity';
    protected $primaryKey = 'id';
    protected $guarded = "";
}
