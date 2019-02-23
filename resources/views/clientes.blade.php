@extends('layouts/plantilla')
<div class="row">
    <div class="col-12">
        <h1 class="display-3" style="text-shadow: 2px 2px 2px #000000; color:white;">Clientes</h1>
    </div>
</div>
@section('content')
<div class="row">
    <div class="col-12">
        <h2>Listado de Clientes</h2>
        <br>
        <div class="table-responsive">
            <table class="table table-hover" style="border:1px solid;">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Cod. Cliente</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Provincia</th>
                </tr>
                </thead>
                    <tbody>
                    <?php
                    $datos_cliente = DB::table('clientes')->get();
                    foreach ($datos_cliente as $key => $value) {
                        echo"<tr>";
                            echo "<th scope='row'>".$value->id."</th>";
                            echo "<th scope='row'>".$value->Nombre."</th>";
                            echo "<th scope='row'>".$value->Email."</th>";
                            echo "<th scope='row'>".$value->Provincia."</th>";
                        echo"</tr>";
                    }
                    ?>
                    </tbody>
            </table>
        </div>
        <br>
        <button type="button" class="btn btn-success">Agregar Cliente</button>
    </div>
</div>
@stop