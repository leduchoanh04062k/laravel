<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymenReceipt extends Model
{
    use HasFactory;
    protected $table = 'payment_receipt';
    protected $primaryKey = 'id';
    protected $guarded = [];
}