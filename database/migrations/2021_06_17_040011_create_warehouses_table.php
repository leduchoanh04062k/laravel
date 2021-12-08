<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->integer('supplier_id');
            $table->integer('stock_id');
            $table->integer('unit_id');
            $table->integer('lotno_id');
            $table->string('name');
            $table->decimal('price',15);
            $table->decimal('discount',15);
            $table->integer('VAT');
            $table->string('reasons');
            $table->string('handling_measures');
            $table->string('note');
            $table->enum('type',['import_from_supplier','import_inventory','return_from_customer','return_from_supplier','destruction_export']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouses');
    }
}
