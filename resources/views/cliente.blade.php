@extends('layouts/plantilla')
@section('pageTitle', 'Clientes')
@section('content')
<div class="row">
    <div class="col-12">
        <h2 class="display-3" style="text-shadow: 2px 2px 2px #000000; color:white;">Datos Cliente</h2>
    </div>
</div>
<?php
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $idCliente = explode("/",$url);
    $infoCliente = DB::table('clientes')->where('id', $idCliente[4])->get();
?>
<div class="row">
    <div class="col-12">
        <h3>Información</h3>
	</div>
    <div class="col-12">
        <h2>Archivos</h2>
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
</div>
<script type="text/javascript">
    var Consulta = <?php echo json_encode($infoCliente);?>;
    prueba(Consulta, "h3");
    
</script>          
@stop
