@extends('templates.master')

@section('contenido-principal')
<div class="container">
    <hr>
    <div class="text-center mt-4">
        <div class="row-2">
            <div class="col-md-6 offset-md-3">
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
            </div>
        </div>
        <h2>Administrador: {{ $cuenta->user }}</h2>
        <div class="text-center mt-4">
            <a type="button" class="btn btn-secondary" href="{{ route('admin.artistaslista')}}">Ver Cuentas</a>
        </div>
        <div class="text-center mt-4">
            <a type="button" class="btn btn-secondary" href="{{ route('admin.perfiles')}}">Ver Perfiles</a>
        </div>
        <div class="text-center mt-4">
            <a type="button" class="btn btn-secondary" href="{{route('auth.registrar')}}">Registrar nuevo usuario</a>
        </div>
    </div>  
</div>




@endsection