@extends('layouts/plantilla')
@section('pageTitle', 'Crear Usuario')
@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="display-3">Crear Usuario</h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <h2 align="center">Crear Un Nuevo Usuario</h2>
		<form id='formulario' action="{{ action('usuariosController@store') }}" method='POST'>
		{{ csrf_field() }}
		<label>Nombre</label>
		<input type="text" id="nombre" name='nombre' class="formularioUsuarios" placeholder='Nombre'>

		<label>Password</label><br>	
		<input type="password" id="password" name='password' class="formularioUsuarios" placeholder='Password' size="72px">

		<label>Apellido</label>
		<input type="text" id="apellido" name='apellido' class="formularioUsuarios" placeholder='Apellido'>

		<label>Tipo Usuario</label>
		<input type="text" id="tipo_usuario" name="tipo_usuario" class="formularioUsuarios" placeholder='Tipo Usuario'>

		<label>Email</label>
		<input type="text" id="email" name="email" class="formularioUsuarios" placeholder='Email'>

		<label>Telefono</label>
		<input type="number" id="telefono" name="telefono" class="formularioUsuarios" placeholder='Telefono'>

				
		<input id='btNuevoCliente' onclick='validarFormularioUsuarios();'  class='btn btn-primary' name='enviar' value="Agregar">
	</form>
	</div>	
</div>

@stop


