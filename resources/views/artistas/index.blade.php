@extends('templates.master')

@section('contenido-principal')

<div class="container">
    <hr>
    <div class="text-center mt-4">
        <h2>Usuario: {{Auth::user()->user}}</h2>
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
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="photo">Selecciona una foto:</label>
                                <br>
                                <br>
                                <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*" required>
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
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Titulo</h5>
                    <hr>
                    <img src="{{ asset('images/huevo.jpeg') }}" class="card-img-top img-fluid" alt="">
                    <hr>
                    <button class="btn btn-primary">Editar foto</button>
                    <button class="btn btn-danger">Borrar foto</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Titulo</h5>
                    <hr>
                    <img src="{{ asset('images/auto.jpg') }}" class="card-img-top img-fluid" alt="">
                    <hr>
                    <button class="btn btn-primary">Editar foto</button>
                    <button class="btn btn-danger">Borrar foto</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Titulo</h5>
                    <hr>
                    <img src="{{ asset('images/limo.jpeg') }}" class="card-img-top" alt="">
                    <hr>
                    <button class="btn btn-primary">Editar foto</button>
                    <button class="btn btn-danger">Borrar foto</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Titulo</h5>
                    <hr>
                    <img src="{{ asset('images/lambo.jpg') }}" class="card-img-top" alt="">
                    <hr>
                    <button class="btn btn-primary">Editar foto</button>
                    <button class="btn btn-danger">Borrar foto</button>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection