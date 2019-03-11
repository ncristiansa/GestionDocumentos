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
            $table->string('nombreVentas');
            $table->timestamps();
            $table->foreign('id_cliente')->references('id')->on('clientes');


        });

        Schema::create('factura', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_venta')->unsigned();
            $table->string('archivo');
            $table->timestamps();
            $table->foreign('id_venta')->references('id')->on('ventas');


        });

        Schema::create('albaran', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_venta')->unsigned();
            $table->string('archivo');
            $table->timestamps();
            $table->foreign('id_venta')->references('id')->on('ventas');


        });

        Schema::create('presupuesto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_venta')->unsigned();
            $table->string('archivo');
            $table->timestamps();
            $table->foreign('id_venta')->references('id')->on('ventas');


        });

        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_venta')->unsigned();
            $table->string('archivo');
            $table->timestamps();
            $table->foreign('id_venta')->references('id')->on('ventas');


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
