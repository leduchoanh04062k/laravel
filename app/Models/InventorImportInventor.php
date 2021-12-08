<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventorImportInventor extends Model
{
    use HasFactory;
    protected $table = 'inventor_import_inventories';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
