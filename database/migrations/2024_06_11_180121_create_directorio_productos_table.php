<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectorioProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directorio.directorio_productos', function (Blueprint $table) {
            $table->bigInteger('id_producto')->autoIncrement();
            $table->bigInteger('id_ddjj');
            $table->string('path_file_photo1')->nullable();
            $table->string('path_file_photo2')->nullable();
            $table->string('path_file_photo3')->nullable();
            $table->bigInteger('id_categoria')->nullable();
            $table->bigInteger('id_empresa')->nullable();
            $table->bigInteger('id_empresa_rubro')->nullable();
            $table->timestamps();
            $table->foreign('id_categoria')->references('id_categoria')->on('directorio.directorio_categoria');
            $table->foreign('id_empresa')->references('id_empresa')->on('public.empresas');
            $table->foreign('id_empresa_rubro')->references('id_rubro')->on('public.empresa_rubros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directorio.directorio_productos');
    }
}
