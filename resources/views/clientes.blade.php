
@extends('layouts/plantilla')
@section('pageTitle', 'Clientes')
@section('content')


<div class="row">
    <div class="col-12">
    @include('breadcrumbs')
        <h1 class="display-3">Clientes</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <h2>Listado de Clientes</h2>
        <br>
        <br>
        <div class="table-responsive">
            <form method="get" class="form-inline" action="clientes">
                <input type="text" class="form-control" placeholder="Buscar" aria-label="Search" name="filtro">
                <input class="btn btn-success" type="submit" name="Buscar" value="Buscar">
            </form>
            <table id="listaclientes" class="table table-hover">
                <thead class="thead-dark">
                    <th> ID</th>
                    <th>Nombre</th> 
                    <th>NIF CIF</th> 
                    <th>Localidad</th> 
                </tr>
                @foreach($clientes as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td><a href="/cliente/{{$item->id}}">{{$item->Nombre}}</a></td>
                        <td>{{$item->NIFCIF}}</td>
                        <td>{{$item->Localidad}}</td>
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

<script type="text/javascript">
    
    
</script>


@stop