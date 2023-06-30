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
        <h2>Usuario: {{ $cuenta->user }}</h2>
        <div class="text-center mt-4">
            <button type="button" class="btn btn-success @if(Auth::user()->perfil_id == 1) d-none @endif" data-bs-toggle="modal" data-bs-target="#exampleModal">Publicar Foto</button>
            <input id="file-input" type="file" style="display: none;">
            <a class="btn btn-primary btn-secondary" href="{{route('artistas.index', $cuenta->user)}}">Volver</a>
        </div>
    </div>
    <hr>

    
    @if (!empty($cuenta->imagen) && (is_array($cuenta->imagen) || is_object($cuenta->imagen)))
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($cuenta->imagen as $imagen)
            <div class="col @if($imagen->baneada == 0) d-none @endif ">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{$imagen->titulo}}</h5>
                        <hr>
                        <img src="{{ asset('./archivo/' . $imagen->archivo) }}" class="card-img-top img-fluid" alt="">
                        <hr>
                        <div class="row d-flex text-center">
                            
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

                            <div class="col">
                                <form method="POST" >
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#razonBanModal{{$imagen->id}}">Motivo ban</button>
                                </form>
                            </div>

                            <div class="modal fade" id="razonBanModal{{$imagen->id}}" tabindex="-1" aria-labelledby="razonBanModal{{$imagen->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="{{route('artistas.banear',$imagen->id)}}">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="razonBanModal{{$imagen->id}}">Motivo del baneo</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <p>Razón del baneo: <span class="fw-bold">{{$imagen->motivo_ban}} </span></p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            @if(Auth::user()->perfil_id == 1) 
                            <div class="col">
                                <form method="POST" >
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#desbanearModal{{$imagen->id}}">Desbanear</button>
                                </form>
                            </div>

                            <div class="modal fade" id="desbanearModal{{$imagen->id}}" tabindex="-1" aria-labelledby="desbanearModalLabel{{$imagen->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="{{route('artistas.desbanear',$imagen->id)}}">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="desbanearModalLabel{{$imagen->id}}">¡Está por desbanear una foto! ¿Está seguro?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-danger">Desbanear</button>
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
