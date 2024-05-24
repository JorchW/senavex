<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria', function (Blueprint $table) {
            $table->integer('id_categoria')->autoIncrement();
            $table->text('nombre_categoria');
            $table->string('descripcion_corta');
            $table->enum('estado', ['activo', 'inactivo', 'eliminado'])->default('activo');
            $table->integer('id_rubro');
            $table->timestamps();
            $table->foreign('id_rubro')->references('id_rubro')->on('rubro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria');
    }
}
