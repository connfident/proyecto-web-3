@extends('templates.master')

@section('contenido-principal')

<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <form method="get" action="/search">
                    <div class="input-group mb-3">
                        <input class="form-control" name="search" placeholder="Ingrese nombre de usuario del artista a buscar" >
                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container d-flex text-center">
        <div class="row flex-row py-4">
            @foreach($imagen as $imagen)
            @if($imagen->baneada == false)
            <div class="col-4 pb-2">
                <div class="card h-100" style="width: 25rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$imagen->titulo}}</h5>
                        <p><span style="color:red;">{{ '@'.$imagen->cuenta_user }}</span></p>
                    </div>
                    <img style="max-height: 15rem; min-height: 5rem;" src="{{ asset('./archivo/' . $imagen->archivo) }}" class="card-img-bottom img-fluid" alt="...">
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>

@endsection