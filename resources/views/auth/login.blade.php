@extends('templates.master')

@section('contenido-principal')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            @if ($errors->any())
                <div class="alert alert-warning">
                    <p>Error!</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <p>• {{ $error }}</p>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Inicio de sesion</div>
                <div class="card-body">
                    <form method="POST" action="{{route('artista.login')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="user" class="col-md-4 col-form-label text-md-end">Usuario</label>
                            <div class="col-md-6">
                                <input id="user" type="text" class="form-control" name="user" value="" autocomplete="user" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Contraseña</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" autocomplete="current-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Iniciar sesion
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection