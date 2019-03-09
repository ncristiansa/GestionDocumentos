<title>Añadir Cliente</title>
@extends('layouts/plantilla')
<div class="row">
    <div class="col-12">
        <h1 class="display-3" style="text-shadow: 2px 2px 2px #000000; color:white;">Añadir Cliente</h1>
    </div>
</div>
@section('content')

	<?php
	echo "<div class='form-group'>";
	echo "<form id='formulario' action='/' method='POST'>";
		?>
			{{ csrf_field() }}
		<?php

		echo"<div class='input-group'>";
      	echo "<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>";
      	echo "<input id='nom' type='text' class='form-control' name='Nombre' placeholder='Nom'>";
    	echo "</div>";

    	
		echo"<div class='input-group'>";
      	echo "<span class='input-group-addon'><i class='glyphicon glyphicon-envelope'></i></span>";
      	echo "<input id='email' type='text' class='form-control' name='Email' placeholder='Email'>";
    	echo "</div>";

    	echo "<div class='input-group'>";
      		echo "<span class='input-group-addon'><i class='glyphicon glyphicon-earphone'></i></span>";
      		echo "<input id='telefon' type='number' class='form-control' name='Telefono' placeholder='Telefon'>";
    	echo "</div>";
    	echo"<div class='input-group'>";
      	echo "<span class='input-group-addon'><i class='glyphicon glyphicon-map-marker'></i></span>";
      	echo "<input id='direccio' type='text' class='form-control' name='Direccion' placeholder='Direccio'>";
    	echo "</div>";

    	echo"<div class='input-group'>";
      	echo "<span class='input-group-addon'><i class='glyphicon glyphicon-credit-card'></i></span>";
      	echo "<input id='nifCif' type='text' class='form-control' name='NIFCIF' placeholder='NIF/CIF'>";
    	echo "</div>";

    	echo"<div class='input-group'>";
      	echo "<span class='input-group-addon'><i class='glyphicon glyphicon-pushpin'></i></span>";
      	echo "<input id='prov' type='text' class='form-control' name='Provincia' placeholder='Provincia'>";
    	echo "</div>";


    	echo"<div class='input-group'>";
      	echo "<span class='input-group-addon'><i class='glyphicon glyphicon-map-marker'></i></span>";
      	echo "<input id='localitat' type='text' class='form-control' name='Localidad' placeholder='Localitat'>";
    	echo "</div>";

    	echo"<div class='input-group'>";
      	echo "<span class='input-group-addon'>C.P.</span>";
      	echo "<input id='cp' type='number' class='form-control' name='CP' placeholder='Codi Postal'>";
    	echo "</div>";

    echo "<br>";

		echo "<input onclick='comprobarCampos()'  class='btn btn-default' type='submit' name='enviar' value='Añadir'>";
	echo "</form>";
	echo "</div>";
	?>
    
@stop


