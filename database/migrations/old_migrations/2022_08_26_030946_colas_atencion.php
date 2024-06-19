<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ColasAtencion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colas_atencion', function (Blueprint $table) {
            $table->integer('id_colas_atencion')->autoIncrement();
            $table->integer('id_producto');
            $table->integer('id_user');
           
            $table->enum('estado', ['atentido', 'espera'])->default('espera');

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
        Schema::dropIfExists('colas_atencion');
    }
}
