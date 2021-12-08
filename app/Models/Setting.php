<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [ 'trangthai','tenmauin','loaimauin','loaikichthuoc','chieurong','chieudai','content' ];
}
