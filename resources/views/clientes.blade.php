
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
            
            {!! $clientes->links()!!}
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
    Consulta = {!! json_encode($clientes->toArray(), JSON_HEX_TAG) !!}['data'];
    generaTabla(Consulta,"form");
</script>
<script>
//Esta funcion y sus respectivas instrucciones nos permiten hacer clic sobre un campo de la tabla y ver los datos de forma ascendente y descendente
document.addEventListener("DOMContentLoaded", function(){
        AscendenteDescendente();
    }, false);
</script>


@stop