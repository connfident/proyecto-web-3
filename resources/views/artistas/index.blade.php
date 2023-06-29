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
        <h2>Usuario: {{ Auth::user()->user }}</h2>
        <div class="text-center mt-4">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Publicar Foto</button>
            <input id="file-input" type="file" style="display: none;">
            <button class="btn btn-primary btn-danger">Fotos Baneadas</button>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadModalLabel">Nueva Publicacion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario -->
                        <form method="POST" action="{{ route('artistas.storage') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="titulo" class="col-form-label">Titulo:</label>
                                <textarea class="form-control" id="titulo" name="titulo"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="archivo">Selecciona una foto:</label>
                                <br>
                                <br>
                                <input type="file" class="form-control-file" id="archivo" name="archivo" accept="image/*" required>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary">Subir foto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

    
    @if (!empty($cuenta->imagen) && (is_array($cuenta->imagen) || is_object($cuenta->imagen)))
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($cuenta->imagen as $imagen)
            <div class="col @if($imagen->baneada == 1) d-none @endif ">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{$imagen->titulo}}</h5>
                        <hr>
                        <img src="{{ asset('./archivo/' . $imagen->archivo) }}" class="card-img-top img-fluid" alt="">
                        <hr>
                        <div class="row d-flex text-center">
                            <div class="col">
                                <button class="btn btn-primary">Editar foto</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-danger">Borrar foto</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>

@endsection
