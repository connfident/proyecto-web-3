@extends('templates.master')

@section('contenido-principal')

<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <label for="exampleDataList" class="form-label">Filtrar por artistas</label>
            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Busqueda...">
            <datalist id="datalistOptions">
                <option value="Artista 1"> {{-- Vincular a usuarios --}}
                <option value="Artista 2"> {{-- Vincular a usuarios --}}
                <option value="Artista 3"> {{-- Vincular a usuarios --}}
                <option value="Artista 4"> {{-- Vincular a usuarios --}}
                <option value="Artista 5"> {{-- Vincular a usuarios --}}
            </datalist>
        </div>
    </div>

    <div class="container d-flex justify-content-center">
        <div class="row flex-column py-4">
            <div class="col-12 pb-2">
                <div class="card" style="width: 39rem;">
                    <div class="card-body">
                        <h5 class="card-title">Naes Chilenas</h5>
                        <p class="card-text">No saen na de las naes chilenas full tuning </p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                    <img src="{{ asset('images/huevo.jpeg') }}" class="card-img-bottom" alt="...">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection