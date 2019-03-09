
@extends('layouts/plantilla')
@section('pageTitle', 'Clientes')
@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="display-3">Clientes</h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <h2>Listado de Clientes</h2>
        <br>
        <br>
        <button type="button" class="btn btn-success" onclick="location.href = '{{ url('formulario')}}'">Agregar Cliente</button>
    </div>
</div>
    <script type="text/javascript">
        var infoCliente = '{{$clientes}}';
        var Consultas = JSON.parse(infoCliente.replace(/&quot;/g,'"'));
        generaTabla(Consultas,"h2");     
    </script>
@stop