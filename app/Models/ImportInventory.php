<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportInventory extends Model
{
    use HasFactory;
    protected $table = 'import_inventory';
    protected $primaryKey = 'id';
    protected $guarded = [];
}