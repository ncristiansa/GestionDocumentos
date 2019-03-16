@extends('layouts/plantilla')
@section('pageTitle', 'Crea una nueva venta')
@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="display-3">Nueva venta</h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <h2>Formulario</h2>
    </div>
</div>
<script type="text/javascript">
    var infoVenta = '{{$Ventas}}';
    var ConsultaVenta = JSON.parse(infoVenta.replace(/&quot;/g,'"'));
   creaFormulario(undefined, "h2", ConsultaVenta, undefined, "nuevaVenta");
</script>
@stop