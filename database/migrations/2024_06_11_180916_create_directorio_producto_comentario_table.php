<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectorioProductoComentarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directorio.directorio_producto_comentario', function (Blueprint $table) {
            $table->bigInteger('id_producto_comentario');
            $table->string('comentario');
            $table->smallInteger('estrellas');
            $table->string('nombre_usuario');
            $table->bigInteger('id_producto');
            $table->timestamps();
            $table->foreign('id_producto')->references('id_producto')->on('directorio.directorio_productos');
            $table->primary('id_producto_comentario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directorio.directorio_producto_comentario');
    }
}
