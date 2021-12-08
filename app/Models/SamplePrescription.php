<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SamplePrescription extends Model
{
    use HasFactory;
    protected $table = 'sample_prescription';
    protected $primaryKey = 'id';
    protected $guarded="";
}
