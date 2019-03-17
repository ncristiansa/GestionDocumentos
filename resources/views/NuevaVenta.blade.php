@extends('layouts/plantilla')
@section('pageTitle', 'Crea una nueva venta')
@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="display-3">Nueva venta</h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <h2>Formulario</h2>
        <form id="formulario-venta" class="formulario">
            {{ csrf_field() }}
            <label>Comprador</label><br>
            <input type="text" name="comprador">
            <label>Nombre venta</label><br>
            <input type="text" name="nombreventa"><br>
            <input id="btnNuevaVenta" onclick="validarFormularioVenta(); return false;" type="submit" name="nuevaventa" class="btn btn-success" value="Añadir venta">
        </form>
    </div>
</div>
@stop