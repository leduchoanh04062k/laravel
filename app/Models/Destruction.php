<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destruction extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'hour', 'note'];
    public function stock_destruction(){
        return $this->hasMany('App\Models\StockImportDestruction', 'destructions_id');
    }
}
