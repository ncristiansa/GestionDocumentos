<title>Información del cliente</title>
@extends('layouts/plantilla')
<div class="row">
    <div class="col-12">
        <h1 class="display-3" style="text-shadow: 2px 2px 2px #000000; color:white;">Datos Cliente</h1>
    </div>
</div>
@section('content')

<?php
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $idCliente = explode("/",$url);
    $infoUsuario = DB::table('clientes')->where('id', $idCliente[4])->get();  
?>
<div class="row">
    <div class="col-12">
    <?php
        foreach ($infoUsuario as $value) {
            echo "<h1>".$value->Nombre."</h1>";
            echo "<span>Email: ".$value->Email."</span><br>";
            echo "<span>Telefono: ".$value->Telefono."</span><br>";
            echo "<span>Direccion: ".$value->Direccion."</span><br>";
            echo "<span>Provincia: ".$value->Provincia."</span><br>";
            echo "<span>Localidad: ".$value->Localidad."</span><br>";
            echo "<span>CP: ".$value->CP."</span><br>";
            echo "<span>Creado: ".$value->created_at."</span><br>";
            echo "<span>Editado: ".$value->updated_at."</span><br>";

        }
    ?>
	</div>
</div>            
@stop