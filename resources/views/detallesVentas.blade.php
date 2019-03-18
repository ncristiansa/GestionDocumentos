@extends('layouts/plantilla')
@section('pageTitle', 'Detalles Ventas')
@section('content')
<?php
	$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $idVenta = explode("/",$url);
  $docsFactura = DB::table('documentos')->where('tipo_documento', 'factura')->where('id_venta',$idVenta[4])->get(['id','id_venta','archivo', 'updated_at']);
  $docsAlbaran = DB::table('documentos')->where('tipo_documento', 'albaran')->where('id_venta',$idVenta[4])->get(['id','id_venta','archivo', 'updated_at']);
  $docsPresupuesto = DB::table('documentos')->where('tipo_documento', 'presupuesto')->where('id_venta',$idVenta[4])->get(['id','id_venta','archivo', 'updated_at']);
?>

<div class="row">
    <div class="col-12">
    @include('breadcrumbs')
        <h1 class="display-3">Detalle Venta</h1>
    </div >
    
    <div id="factura" class="col-12">
        @foreach($Ventas as $venta)
        <form id="form-factura" method='POST' action='/detallesVentas/{{$venta->id}}' accept-charset='UTF-8' enctype='multipart/form-data' files='true'>   
            {{ csrf_field() }}
        </form>
        @endforeach
	</div>
	<div id="albaran" class="col-12">
		  @foreach($Ventas as $venta)
        <form method='POST' id="form-albaran" action='/detallesVentas/{{$venta->id}}' accept-charset='UTF-8' enctype='multipart/form-data' files='true'>   
            {{ csrf_field() }}
        </form>
      @endforeach
	</div>

	<div id="presupuesto" class="col-12">
      @foreach($Ventas as $venta)
        <form method='POST' id="form-presupuesto" action='/detallesVentas/{{$venta->id}}' accept-charset='UTF-8' enctype='multipart/form-data' files='true'>   
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
  var ConsultaDocsFactura = <?php echo json_encode($docsFactura);?>;
  var ConsultaDocsAlbaran = <?php echo json_encode($docsAlbaran);?>;
  var ConsultaDocsPresupuesto = <?php echo json_encode($docsPresupuesto);?>;
  
  formularioDocumento("factura", "Facturas", "form-factura", ConsultaVentas, "factura");
  formularioDocumento("albaran", "Albaranes", "form-albaran", ConsultaVentas, "albaran");
  formularioDocumento("presupuesto", "Presupuestos", "form-presupuesto", ConsultaVentas, "presupuesto");
  detallesFichero(ConsultaDocsFactura,"Facturas");
  detallesFichero(ConsultaDocsAlbaran,"Albaranes");
  detallesFichero(ConsultaDocsPresupuesto,"Presupuestos");
  
</script>
<script>
$(document).ready(function(){
  $('input[type="file"]').on('change', function(){
    var textoDocumento = $( this ).val().split('.').pop();
      if(textoDocumento == "pdf"){
        $('#btNuevoArchivo').submit();
      }
      else
      {
        mensajeError("La extension de tu documento no es PDF.", undefined, false, "btn btn-success");
      }

  });
});
</script>
@stop