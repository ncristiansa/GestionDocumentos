
@extends('layouts/plantilla')
@section('pageTitle', 'Clientes')
@section('content')


<div class="row">
    <div class="col-12">
        <h1 class="display-3">Clientes</h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <h2>Listado de Clientes</h2>
        <br>
        <br>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <th> ID</th>
                    <th>Nombre</th> 
                </tr>
                @foreach($clientes as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td><a href="/cliente/{{$item->id}}">{{$item->Nombre}}</a></td>
                    </tr>
                @endforeach
            </table>
       
             {!! $clientes->render()!!}
            <br>
            {{$clientes->total()}} registros |
            página {{$clientes->currentPage()}}
            de {{$clientes->lastPage()}}

        </div>
        
        <br>
        <button type="button" class="btn btn-success" onclick="location.href = '{{ url('formulario')}}'">Agregar Cliente</button>
    </div>
</div>
@stop