@extends('layouts/plantilla')
<div class="row">
    <div class="col-12">
        <h1 class="display-3" style="text-shadow: 2px 2px 2px #000000; color:white;">Clientes</h1>
    </div>
</div>
@section('content')
<div class="row">
    <div class="col-12" style="background-color:white;padding:2%; border:1px solid;">
        <h2>Listado de Clientes</h2>
        <br>
        <div class="table-responsive">
            <table class="table table-hover" style="border:1px solid;">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Cod. Cliente</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Fecha Modificación</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">NIF/CIF</th>
                    <th scope="col">Provincia</th>
                    <th scope="col">Localidad</th>
                    <th scope="col">C.P</th>
                </tr>
                </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Cristian</td>
                            <td>ncristiansalinasandia@gmail.com</td>
                            <td>665353444</td>
                        </tr>
                    </tbody>
            </table>
        </div>
        <br>
        <button type="button" class="btn btn-success">Agregar Cliente</button>
    </div>
</div>
@stop