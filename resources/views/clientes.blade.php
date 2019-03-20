
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
    $('th').click(function(){
    var table = $(this).parents('table').eq(0)
    var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
    this.asc = !this.asc
    if (!this.asc){rows = rows.reverse()}
    for (var i = 0; i < rows.length; i++){table.append(rows[i])}
});
function comparer(index) {
    return function(a, b) {
        var valA = getCellValue(a, index), valB = getCellValue(b, index)
        return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
    }
}
function getCellValue(row, index){ return $(row).children('td').eq(index).text() }
    }, false);
</script>
@stop