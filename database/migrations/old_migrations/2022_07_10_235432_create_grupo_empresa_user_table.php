<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoEmpresaUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_empresa_user', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_empresa');
            $table->integer('id_rol');
            $table->integer('id_user');
            $table->timestamps();
            $table->foreign('id_empresa')->references('id_empresa')->on('empresas');
            $table->foreign('id_rol')->references('id_rol')->on('rol');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo_empresa_user');
    }
}
