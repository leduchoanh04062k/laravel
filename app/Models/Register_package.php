<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register_package extends Model
{
    use HasFactory;
    protected $table = 'register_package';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
