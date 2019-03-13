@extends('layouts/plantilla')
@section('pageTitle', 'Clientes')
@section('content')
<?php
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $idDocumento = explode("/",$url);
  $id_venta = DB::table('documentos')->where('id', $idDocumento[4])->get(["id_venta"]);
  $id_doc = DB::table('documentos')->where('id', $idDocumento[4])->get(['id','id_venta','archivo', 'updated_at']);
?>
<div class="row">
    <div class="col-12">
        <h1 class="display-3" id="modificar">Modificar</h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
      <?php
        echo"<form id='form-factura' method='POST' action='/Modificar/$idDocumento[4]' accept-charset='UTF-8' enctype='multipart/form-data' files='true'>";  
        ?>
        @foreach($documento as $doc)
        
        @endforeach
            {{ csrf_field() }}
          <input type="file" name="archivo">
          <input type="submit" name="enviar" value="Guardar">
        </form>
        
        
</div>
</div>

<script type="text/javascript">
  var Consulta = <?php echo json_encode($id_doc); ?>;
  detallesFicheroModificar(Consulta,"modificar");
</script>
@stop