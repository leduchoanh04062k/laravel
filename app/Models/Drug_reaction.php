<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug_reaction extends Model
{
    use HasFactory;
    protected $table = 'drug_reaction';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
