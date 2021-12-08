<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug_book extends Model
{
    use HasFactory;
    protected $table = 'drug_tracking_book';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
