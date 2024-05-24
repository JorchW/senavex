<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('id_producto')->autoIncrement();
            $table->string('cantidad_disponible');
            $table->string('nombre_producto');
            $table->string('imagen_producto');
            $table->text('descripcion_producto');
            $table->string('precio_producto');
            $table->string('precio_producto_max');
            $table->string('codigo_nandina');
            $table->integer('estrella');
            $table->string('numero_producto');
            $table->enum('estado_producto',['popular','normal']);
            $table->enum('estado', ['activo', 'inactivo', 'eliminado', 'observado'])->default('inactivo');


            $table->integer('id_rubro');
            $table->integer('id_categoria');
            $table->integer('id_unidad_medida');
            $table->integer('id_moneda');

            $table->integer('id_empresa');
 
            $table->timestamps();
            $table->foreign('id_rubro')->references('id_rubro')->on('rubro');
            $table->foreign('id_categoria')->references('id_categoria')->on('categoria');
            $table->foreign('id_unidad_medida')->references('id_unidad_medida')->on('unidad_medidas');
            $table->foreign('id_moneda')->references('id_moneda')->on('monedas');

            $table->foreign('id_empresa')->references('id_empresa')->on('empresas');
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
