<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quality_import extends Model
{
    use HasFactory;
    protected $table = 'periodic_qulity_import';
    protected $primaryKey = 'id';
    protected $guarded = "";
}
