<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clave');
            $table->string('sku');
            $table->string('skuVnpk');
            $table->unsignedInteger('provedor');
            $table->unsignedInteger('categoria');
            $table->string('descripcion');
            $table->string('descripcionE');
            $table->string('costo');
            $table->string('iva_costo');
            $table->string('ieps_costo');
            $table->string('total_costo');
            $table->string('precio_Mayoreo');
            $table->string('iva_Precio_Mayoreo');
            $table->string('ieps_Precio_Mayoreo');
            $table->string('total_Precio_Mayoreo');
            $table->string('precio_Medio_Mayoreo');
            $table->string('iva_Precio_Medio_Mayoreo');
            $table->string('ieps_Precio_Medio_Mayoreo');
            $table->string('total_Precio_Medio_Mayoreo');
            $table->string('precio_Retail');
            $table->string('iva_Precio_Retail');
            $table->string('ieps_Precio_Retail');
            $table->string('total_Precio_Retail');
            $table->string('existencia');
            $table->unsignedInteger('unidad_Medida');
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
        Schema::dropIfExists('productos');
    }
}
