<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre');
            $table->string('Email');
            $table->integer('Telefono');
            $table->string('Direccion');
            $table->string('NIFCIF');
            $table->string('Provincia');
            $table->string('Localidad');
            $table->integer('CP');
            $table->timestamps();


        });
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cliente')->unsigned();
            $table->string('Comprador');
            $table->binary('archivo');
            $table->timestamps();
            $table->foreign('id_cliente')->references('id')->on('clientes');


        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');

    }
}
