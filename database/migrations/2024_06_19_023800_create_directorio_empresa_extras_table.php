<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectorioEmpresaExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directorio.directorio_empresa_extras', function (Blueprint $table) {
            $table->bigInteger('id_empresa_extras')->autoIncrement();
            $table->string('path_file_foto1');
            $table->string('path_file_foto2')->nullable();
            $table->bigInteger('id_empresa')->unsigned();
            $table->timestamps();
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
        Schema::dropIfExists('directorio.directorio_empresa_extras');
    }
}
