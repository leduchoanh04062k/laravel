<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pack_data extends Model
{
    use HasFactory;
    protected $table = 'pack_data';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
