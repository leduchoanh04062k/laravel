<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckInventory extends Model
{
    use HasFactory;
    protected $table = 'check_inventory';
    protected $primaryKey = 'id';
    protected $guarded = [];
}