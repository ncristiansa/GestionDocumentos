@extends('layouts/plantilla')
@section('pageTitle', 'Detalles Ventas')
@section('content')
<?php
	$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $idVenta = explode("/",$url);
?>
<div class="row">
    <div class="col-12">
        <h1 class="display-3">Detalles Ventas</h1>
    </div >
    <div id="factura" class="col-12">
    	<h3>Factura</h3>
    	<form method="POST" action="http://diamond-chaos.codio.io:3000/tuto/public/storage/create" accept-charset="UTF-8" enctype="multipart/form-data">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <div class="form-group">
             
              <div class="col-md-6">
                <input type="file"  name="file" >
                <input type="hidden" id="custId" name="id_venta" value="'<?php $idVenta[4]?>'">
              </div>
            </div>
 
            <div class="form-group">
              <div class="col-md-6 ">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </div>
          </form>
	</div>

	<div id="albaran" class="col-12">
		<h3>Albaran</h3>
		<form method="POST" action="http://diamond-chaos.codio.io:3000/tuto/public/storage/create" accept-charset="UTF-8" enctype="multipart/form-data">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <div class="form-group">
             
              <div class="col-md-6">
                <input type="file"  name="file" >
              </div>
            </div>
 
            <div class="form-group">
              <div class="col-md-6 ">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </div>
          </form>
	</div>

	<div id="presupuesto" class="col-12">
		<h3>Presupuesto</h3>
		<form method="POST" action="http://diamond-chaos.codio.io:3000/tuto/public/storage/create" accept-charset="UTF-8" enctype="multipart/form-data">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <div class="form-group">
             
              <div class="col-md-6">
                <input type="file"  name="file" >
              </div>
            </div>
 
            <div class="form-group">
              <div class="col-md-6 ">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </div>
          </form>
	</div>

	<div id="pedido" class="col-12">
		<h3>Pedido</h3>
		<form method="POST" action="http://diamond-chaos.codio.io:3000/tuto/public/storage/create" accept-charset="UTF-8" enctype="multipart/form-data">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <div class="form-group">
             
              <div class="col-md-6">
                <input type="file"  name="file" >
              </div>
            </div>
 
            <div class="form-group">
              <div class="col-md-6 ">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </div>
          </form>
	</div>
</div>
<?php
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $idVenta = explode("/",$url);
    $infoVentas = DB::table('ventas')->where('id', $idVenta[4])->get(["id","id_cliente","Comprador","archivo","updated_at"]);

?>

<script type="text/javascript">

	var ConsultaVentas = <?php echo json_encode($infoVentas);?>;
    visualizar(ConsultaVentas,"h1");
</script>
@stop