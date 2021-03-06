@extends('layouts/plantilla')
@section('pageTitle', 'Crea una nueva venta')
@section('content')
<div class="row">
    <div class="col-12">
    @include('breadcrumbs')
        <h1 class="display-3">Nueva venta</h1>
    </div>
</div>
<div class="row">

    <div class="col-12">
        <h2>Formulario</h2>
        @foreach($Clientes as $item)
        <form id="formulario-venta" class="formulario" action="/cliente/{{$item->id}}" method="POST">
        @endforeach
            {{ csrf_field() }}
            <label>Nombre del cliente (comprador)</label><br>
            <input type="text" name="comprador">
            <label>Nombre de la venta</label><br>
            <input type="text" name="nombreventa">
            <br>
            <label>Estado</label><br>
            <input type="radio" name="estado" value="Activo">Activo<br>
            <input type="radio" name="estado" value="No Activo">No Activo<br>
            <br>
            <input type="button" id="btnNuevaVenta" name="nuevaventa" class="btn btn-success" value="Añadir venta" onclick="validarFormularioVenta();"/>
        </form>
    </div>
</div>
@stop