@extends('layouts/plantilla')
@section('pageTitle', 'Clientes')
@section('content')
<div class="row">
    <div class="col-12">
        <h2 class="display-3">Datos Cliente</h2>
    </div>
</div>

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
        <h2>Detalles Ventas</h2>
    </div>
    <div class='container'>
        <div  class='p-3 mb-2 bg-light text-dark'>
            <div class='form-group'>
                <label id="ventas" for='labelVentas'>Ventas</label>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">

    var infoCliente = '{{$Clientes}}';
    var Consultas = JSON.parse(infoCliente.replace(/&quot;/g,'"'));
    visualizarInfo(Consultas,"form");
    
    
</script>

@stop
