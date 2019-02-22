<!doctype <!DOCTYPE html>
<html>
<head>
  @include('includes.head')
   
    <title>Añadir Clientes</title>
    
    <style type="text/css">
    	#formulario{
    		width: 50%;
    		margin-left: 25%;
    		margin-top: 5%;
    	}
    </style>
    
</head>
<body>
	<?php
	echo "<div class='form-group'>";
	echo "<form id='formulario'>";

		echo"<div class='input-group'>";
      	echo "<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>";
      	echo "<input id='nom' type='text' class='form-control' name='nom' placeholder='Nom'>";
    	echo "</div>";

    	
		echo"<div class='input-group'>";
      	echo "<span class='input-group-addon'><i class='glyphicon glyphicon-envelope'></i></span>";
      	echo "<input id='email' type='text' class='form-control' name='email' placeholder='Email'>";
    	echo "</div>";

    	echo "<div class='input-group'>";
      		echo "<span class='input-group-addon'><i class='glyphicon glyphicon-earphone'></i></span>";
      		echo "<input id='telefon' type='number' class='form-control' name='Telefon' placeholder='Telefon'>";
    	echo "</div>";

    	echo"<div class='input-group'>";
      	echo "<span class='input-group-addon'><i class='glyphicon glyphicon-calendar'></i></span>";
      	echo "<input id='data' type='date' class='form-control' name='data' placeholder='Data'>";
    	echo "</div>";

    	echo"<div class='input-group'>";
      	echo "<span class='input-group-addon'><i class='glyphicon glyphicon-calendar'></i></span>";
      	echo "<input id='dataModificacio' type='date' class='form-control' name='dataModificacio' placeholder='Data Modificació'>";
    	echo "</div>";

    	echo"<div class='input-group'>";
      	echo "<span class='input-group-addon'><i class='glyphicon glyphicon-map-marker'></i></span>";
      	echo "<input id='direccio' type='text' class='form-control' name='direccio' placeholder='Direccio'>";
    	echo "</div>";

    	echo"<div class='input-group'>";
      	echo "<span class='input-group-addon'><i class='glyphicon glyphicon-credit-card'></i></span>";
      	echo "<input id='nifCif' type='text' class='form-control' name='nifCif' placeholder='NIF/CIF'>";
    	echo "</div>";

    	echo"<div class='input-group'>";
      	echo "<span class='input-group-addon'><i class='glyphicon glyphicon-pushpin'></i></span>";
      	echo "<input id='prov' type='text' class='form-control' name='prov' placeholder='Provincia'>";
    	echo "</div>";


    	echo"<div class='input-group'>";
      	echo "<span class='input-group-addon'>Localitat</span>";
      	echo "<input id='localitat' type='text' class='form-control' name='localitat' placeholder='Localitat'>";
    	echo "</div>";

    	echo"<div class='input-group'>";
      	echo "<span class='input-group-addon'>C.P.</span>";
      	echo "<input id='cp' type='number' class='form-control' name='cp' placeholder='Codi Postal'>";
    	echo "</div>";

    echo "<br>";

		echo "<input onclick='comprobarCampos()'  class='btn btn-default' type='submit' name='enviar>'";
	echo "</form>";
	echo "</div>";
	?>
    
</body>
</html>


