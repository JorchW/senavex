<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectorioPreciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directorio.directorio_precios', function (Blueprint $table) {
            $table->bigInteger('id_precio');
            $table->integer('cantidad_minima');
            $table->integer('cantidad_maxima');
            $table->integer('precio');
            $table->integer('id_moneda');
            $table->bigInteger('id_producto');
            $table->timestamps();
            $table->foreign('id_producto')->references('id_producto')->on('directorio.directorio_productos');
            $table->primary('id_precio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directorio.directorio_precios');
    }
}
