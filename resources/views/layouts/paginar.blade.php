@extends('layouts/plantilla')
@section('pageTitle', 'Paginar')
@section('content')
<div class="row">
    <div class="col-12">
        <h2 class="display-3">Paginar</h2>
    </div>
</div>

        
    {{ $users->links() }}




@stop
