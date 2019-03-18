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
            $table->increments('id')->unique();
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
            $table->increments('id')->unique();
            $table->integer('id_cliente')->unsigned();
            $table->string('Comprador');
            $table->string('nombreVentas');
            $table->timestamps();
            $table->foreign('id_cliente')->references('id')->on('clientes');
        });
        Schema::create('documentos', function(Blueprint $table){
            $table->increments('id')->unique();
            $table->integer('id_venta')->unsigned();
            $table->string('tipo_documento');
            $table->string('archivo');
            $table->timestamps();

            $table->foreign('id_venta')->references('id')->on('ventas');
        });
        Schema::create('usuarios', function(Blueprint $table){
            $table->increments('id')->unique();
            $table->string('Nombre');
            $table->string('Password');
            $table->string('Apellido');
            $table->string('Email');
            $table->integer('Telefono');
            $table->string('tipo_usuario');
            $table->timestamps();

            
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
        Schema::dropIfExists('ventas');
        

    }
}
