<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRubroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rubro', function (Blueprint $table) {
            $table->integer('id_rubro');
            $table->text('nombre_rubro');
            $table->string('abreviacion_rubro');
            $table->text('imagen_rubro');
            $table->enum('estado', ['activo', 'inactivo', 'eliminado'])->default('activo');
            $table->timestamps();
            $table->primary('id_rubro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rubro');
    }
}
