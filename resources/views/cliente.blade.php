@extends('layouts/plantilla')
@section('pageTitle', 'Clientes')
@section('content')
<div class="row">
    <div class="col-12">
        <h2 class="display-3">Datos Cliente</h2>
    </div>
</div>
<?php
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $idCliente = explode("/",$url);
    $infoCliente = DB::table('clientes')->where('id', $idCliente[4])->get();
    $infoVentas = DB::table('ventas')->where('id_cliente', $idCliente[4])->get(['id','archivo','updated_at']);

?>
<div class="row">
    <div class="col-12">
        <h2 class="display-5">Información</h2>
        @foreach($Clientes as $cliente)
            
        <form method="POST" action="/cliente/{{$cliente->id}}">
            {{ csrf_field() }} 
        <form>
        @endforeach
    </div>

    <div class="col-12">
        <h2>Archivos</h2>
    </div>
    <div class='container'>
        <div  class='p-3 mb-2 bg-light text-dark'>
        <div class='form-group'>
        <label id="ventas" for='labelVentas'>Ventas</label>
        <input class='btn btn-default' type='file' id='ventas'>
        <p class='help-block'>Tiene que ser extensión PDF</p>
        </div>
    </div>
    <div class='p-3 mb-2 bg-light text-dark'>
        <div class='form-group'>
        <label id="facturas" for='labelFactura'>Facturas</label>
        <input class='btn btn-default' type='file' id='factura'>
        <p class='help-block'>Tiene que ser extensión PDF</p>
        </div>
    </div>

    <div class='p-3 mb-2 bg-light text-dark'>
        <div class='form-group'>
        <label id="albaran" for='labelAlbaran'>Albaran</label>
        <input class='btn btn-default' type='file' id='albaran'>
        <p class='help-block'>Tiene que ser extensión PDF</p>
        </div>
    </div>
    </div>
</div>
<script type="text/javascript">

    var infoCliente = '{{$Clientes}}';
    var Consultas = JSON.parse(infoCliente.replace(/&quot;/g,'"'));
    visualizarInfo(Consultas,"form");
    var ConsultaVentas = <?php echo json_encode($infoVentas);?>;
    detalles(ConsultaVentas,"ventas");
    
</script>

@stop
