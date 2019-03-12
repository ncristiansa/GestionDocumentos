@extends('layouts/plantilla')
@section('pageTitle', 'Añadir Cliente')
@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="display-3">Añadir Cliente</h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <h2 align="center">Formulario</h2>
		<form id='formulario' action='/' method='POST'>
		{{ csrf_field() }}
		<input type="text" id="Nombre" name='Nombre' class="formulario" placeholder='Nombre'>
		<input type="text" id="Email" name="Email" class="formulario" placeholder='Email'>
		<input type="tel" id="Telefono" name="Telefono" class="formulario" placeholder='Telefono'>
		<input type="text" id="Direccion" name="Direccion" class="formulario" placeholder='Direccion'>
		<input type="text" id="NIFCIF" name="NIFCIF" class="formulario" placeholder='NIFCIF'>
		<input type="text" id="Provincia" name="Provincia" class="formulario" placeholder='Provincia'>
		<input type="text" id="Localidad" name="Localidad" class="formulario" placeholder='Localidad'>
		<input type="number" id="CP" name="CP" class="formulario" placeholder='Codigo Postal'>
		<button id='btNuevoCliente' onclick='validarFormulario();return false;' class='btn btn-primary' name='enviar'>Añadir</button>
	</form>
	</div>	
</div>
@stop


