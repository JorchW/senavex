<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacion', function (Blueprint $table) {
            $table->integer('id_notificacion')->autoIncrement();
            $table->string('correo_de');
            $table->string('correo_para');
            $table->string('titulo');
            $table->text('mensaje');
            $table->text('imagen');

            $table->enum('estado', ['visto', 'no visto', 'eliminado'])->default('no visto');

            $table->integer('id_producto');
            $table->integer('id_user');
 
            $table->timestamps();
            $table->foreign('id_producto')->references('id_producto')->on('productos');
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
        Schema::dropIfExists('notificacion');
    }
}
