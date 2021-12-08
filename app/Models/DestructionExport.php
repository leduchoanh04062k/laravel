<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestructionExport extends Model
{
    use HasFactory;
    protected $table = 'destruction_export';
    protected $primaryKey = 'id';
    protected $guarded = [];
}