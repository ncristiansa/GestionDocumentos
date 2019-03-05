
@extends('layouts/plantilla')
@section('pageTitle', 'Clientes')
@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="display-3" style="text-shadow: 2px 2px 2px #000000; color:white;">Clientes</h1>
    </div>
</div>
<?php
    $datos_cliente = DB::table('clientes')->select('id','Nombre')->get();
?>
<div class="row">
    <div class="col-12">
        <h2>Listado de Clientes</h2>
        <br>
        <br>
        <button type="button" class="btn btn-success" onclick="location.href = '{{ url('formulario')}}'">Agregar Cliente</button>
    </div>
</div>
    <script type="text/javascript">
        var Consulta = <?php echo json_encode($datos_cliente);?>;
        generaTabla(Consulta,"h2");       
    </script>
@stop