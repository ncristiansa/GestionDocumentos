@extends('layouts/plantilla')
@section('pageTitle', 'Ventas')
@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="display-3" style="text-shadow: 2px 2px 2px #000000; color:white;">Ventas</h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
    	<h2>Archivos</h2>
	</div>
</div>
<?php
echo "<div class='container'>";
 echo "<div  class='p-3 mb-2 bg-light text-dark'>";
    echo "<div class='form-group'>";
    echo "<label for='labelVentas'>Ventas</label>";
    echo "<input class='btn btn-default' type='file' id='ventas'>";
    echo "<p class='help-block'>Tiene que ser extensión PDF</p>";
  	echo "</div>";
 echo "</div>";

 echo "<div class='p-3 mb-2 bg-light text-dark'>";
    echo "<div class='form-group'>";
    echo "<label for='labelFactura'>Facturas</label>";
    echo "<input class='btn btn-default' type='file' id='factura'>";
    echo "<p class='help-block'>Tiene que ser extensión PDF</p>";
    echo "</div>";
 echo "</div>";

 echo "<div class='p-3 mb-2 bg-light text-dark'>";
    echo "<div class='form-group'>";
    echo "<label for='labelAlbaran'>Albaran</label>";
    echo "<input class='btn btn-default' type='file' id='albaran'>";
    echo "<p class='help-block'>Tiene que ser extensión PDF</p>";
    echo "</div>";
 echo "</div>";
echo "</div>";
    
?>

       
@stop  