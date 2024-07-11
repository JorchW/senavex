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
            $table->string('path_file_foto1')->nullable();
            $table->string('path_file_foto2')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('mail')->nullable();
            $table->string('paginaweb')->nullable();
            $table->bigInteger('id_empresa');
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
