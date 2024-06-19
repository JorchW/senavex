<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoRubroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_rubro', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_empresa');
            $table->integer('id_rubro');
            $table->timestamps();
            $table->foreign('id_empresa')->references('id_empresa')->on('empresas');
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
        Schema::dropIfExists('grupo_rubro');
    }
}
