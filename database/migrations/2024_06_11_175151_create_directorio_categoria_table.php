<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectorioCategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directorio.directorio_categoria', function (Blueprint $table) {
            $table->bigInteger('id_categoria');
            $table->string('descripcion');
            $table->string('descripcion_larga');
            $table->timestamps();
            $table->primary('id_categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directorio.directorio_categoria');
    }
}
