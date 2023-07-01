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
        <div class="container flex-row d-flex justify-content-center align-items-center">
            <div class="p-2">
                <h2>{{'@'.$cuenta->user }}</h2>
            </div>
            <div class="p-2">
                <span class="fw-bold">
                    {{$imagen = $cuenta->imagen->where('baneada',0)->count()}}
                </span> 
                Publicaciones
            </div>
        </div>
        <div class="container flex-row d-flex justify-content-center align-items-center">
            <div class="col-12">
                @if((Auth::user()->perfil_id == 2 && Auth::user()->user == $cuenta->user) || Auth::user()->perfil_id == 1)
                <a type="button" class="btn btn-sm btn-secondary @if(Auth::user()->perfil_id == 1) d-none @endif" data-bs-toggle="modal" data-bs-target="#exampleModal">Publicar Foto</a>
                <a class="btn btn-sm btn-primary btn-secondary" href="{{route('artistas.indexban', $cuenta->user)}}">Fotos Baneadas</a>
                <a class="btn btn-sm btn-secondary" href="{{route('admin.artistaslista')}}" >Lista de artistas</a>
                @endif
            </div>
        </div>
        {{$cuenta->nombre}} {{$cuenta->apellido}}   

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
                        <img style="max-height: 10rem; min-height: 2rem;" src="{{ asset('./archivo/' . $imagen->archivo) }}" class="card-img-top img-fluid" alt="">
                        <hr>
                        <div class="row d-flex text-center">
                            @if((Auth::user()->perfil_id == 2 && Auth::user()->user == $cuenta->user))
                            {{-- Editar Imagenes --}}
                            <div class="col">
                                <form method="POST" >
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarModal{{$imagen->id}}">Editar</button>
                                </form>
                            </div>
                            @endif
                            {{-- Modal Confirmar Edicion --}}
                            <div class="modal fade" id="editarModal{{$imagen->id}}" tabindex="-1" aria-labelledby="editarModalLabel{{$imagen->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="{{route('artistas.update',$imagen->id)}}">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="editarModalLabel{{$imagen->id}}">Edicion de foto</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="titulo" class="col-form-label">Titulo:</label>
                                                    <textarea class="form-control" id="titulo" name="titulo"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-success">Confirmar Edición </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Borrar Imagenes --}}
                            @if((Auth::user()->perfil_id == 2 && Auth::user()->user == $cuenta->user))
                            <div class="col">
                                <form method="POST" >
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#borrarModal{{$imagen->id}}">Borrar</button>
                                </form>
                            </div>
                            @endif
                            {{-- Modal Confirmar borrado --}}
                            <div class="modal fade" id="borrarModal{{$imagen->id}}" tabindex="-1" aria-labelledby="borrarModalLabel{{$imagen->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="{{route('artistas.destroy',$imagen->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="borrarModalLabel{{$imagen->id}}">Confirmación de Borrado</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Desea borrar la imagen titulada <span class="text-danger fw-bold">{{$imagen->titulo}}</span>?
                                                <hr>
                                                <img src="{{ asset('./archivo/' . $imagen->archivo) }}" class="card-img-top img-fluid"  alt="">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-danger">Borrar Imagen</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            @if(Auth::user()->perfil_id == 1) 
                            <div class="col">
                                <form method="POST" >
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#banearModal{{$imagen->id}}">Banear</button>
                                </form>
                            </div>

                            <div class="modal fade" id="banearModal{{$imagen->id}}" tabindex="-1" aria-labelledby="banearModalLabel{{$imagen->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="{{route('artistas.banear',$imagen->id)}}">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="banearModalLabel{{$imagen->id}}">¡Está por banear una foto! ¿Está seguro?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="motivo_ban" class="col-form-label">Motivo de ban</label>
                                                    <textarea class="form-control" id="motivo_ban" name="motivo_ban"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-danger">Banear</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>

@endsection
