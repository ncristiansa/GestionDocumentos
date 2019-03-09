@extends('layouts/plantilla')
@section('pageTitle', 'Detalles Ventas')
@section('content')
<div class="row">
    <div class="col-12">
        <h2 class="display-3">Detalles Clientes</h2>
    </div>
</div>
<?php
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $idVenta = explode("/",$url);
    $infoVentas = DB::table('ventas')->where('id', $idVenta[4])->get(["id","id_cliente","Comprador","archivo","updated_at"]);

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css" src="css/Estilo.css"></style>
<script type="text/javascript" src="/js/funciones.js"></script>
<script type="text/javascript">

	var ConsultaVentas = <?php echo json_encode($infoVentas);?>;
    visualizar(ConsultaVentas,"h2");
</script>