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

	</div>
</div>
<script type="text/javascript">
    var Consulta = <?php echo json_encode($infoCliente);?>;
    visualizacionClientes(Consulta,"h2");
</script>          
@stop
