@extends('templates.master')

@section('contenido-principal')
<div class="row pt-4">
    <div class="col-12">
        <h1>Bienvenido {{Auth::user()->user}}</h1>
    </div>
</div>




@endsection