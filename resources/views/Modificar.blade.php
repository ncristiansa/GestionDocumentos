@extends('layouts/plantilla')
@section('pageTitle', 'Clientes')
@section('content')
<?php
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $idDocumento = explode("/",$url);
  $id_venta = DB::table('documentos')->where('id', $idDocumento[4])->get(["id_venta"]);
?>
<div class="row">
    <div class="col-12">
        <h1 class="display-3">Modificar</h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
        @foreach($documento as $doc)
        <form id="form-factura" method='POST' action='/detallesVentas/{{$doc->id}}' accept-charset='UTF-8' enctype='multipart/form-data' files='true'>
          <input type="hidden" name="id" value="{{$doc->id}}">
          <input type="hidden" name="id_venta" value="{{$doc->id_venta}}">
          <input type="hidden" name="tipo_archivo" value="{{$doc->tipo_documento}}">
          <input type="hidden" name="doc" value="{{$doc->archivo}}">  
        @endforeach
        {{ csrf_field() }}
          <input type="file" name="archivo">
          <input type="submit" name="enviar" value="Guardar" class="btn btn-success" style="margin-top:10px;">
        </form>
        
        
</div>
</div>
@stop