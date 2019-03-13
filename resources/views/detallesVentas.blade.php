@extends('layouts/plantilla')
@section('pageTitle', 'Detalles Ventas')
@section('content')

<div class="row">
    <div class="col-12">
        <h1 class="display-3">Detalle Venta</h1>
    </div >
    <div id="factura" class="col-12">
        @foreach($Ventas as $venta)
        <form id="form-factura" method='POST' action='/detalleVentas/{{$venta->id}}' accept-charset='UTF-8' enctype='multipart/form-data' files='true'>   
            {{ csrf_field() }}
        </form>
        @endforeach
	</div>
	<div id="albaran" class="col-12">
		  @foreach($Ventas as $venta)
        <form method='POST' id="form-albaran" action='/detalleVentas/{{$venta->id}}' accept-charset='UTF-8' enctype='multipart/form-data' files='true'>   
            {{ csrf_field() }}
        </form>
      @endforeach
	</div>

	<div id="presupuesto" class="col-12">
      @foreach($Ventas as $venta)
        <form method='POST' id="form-presupuesto" action='/detalleVentas/{{$venta->id}}' accept-charset='UTF-8' enctype='multipart/form-data' files='true'>   
            {{ csrf_field() }}
        </form>
      @endforeach
	</div>
<!-- 
	<div id="pedido" class="col-12">
		<h3>Pedido</h3>
		<form method="POST" action="http://diamond-chaos.codio.io:3000/tuto/public/storage/create" accept-charset="UTF-8" enctype="multipart/form-data">
          </form>
	</div>
-->
</div>
<script type="text/javascript">
  var infoVentas = '{{$Ventas}}';
  var ConsultaVentas = JSON.parse(infoVentas.replace(/&quot;/g,'"'));
  visualizar(ConsultaVentas,"h1");
  formularioDocumento("factura", "Facturas", "form-factura", ConsultaVentas, "factura");
  formularioDocumento("albaran", "Albaranes", "form-albaran", ConsultaVentas, "albaran");
  formularioDocumento("presupuesto", "Presupuestos", "form-presupuesto", ConsultaVentas, "presupuesto");
</script>
<script>
$(document).ready(function(){
  $('input[type="file"]').on('change', function(){
    var textoDocumento = $( this ).val().split('.').pop();
      if(textoDocumento === "pdf"){
        $('#btNuevoArchivo').submit();
      }
      else
      {
        mensajeError("La extension de tu documento no es PDF.", undefined, false, "btn.btn-success");
      }

  });
});
</script>


@stop