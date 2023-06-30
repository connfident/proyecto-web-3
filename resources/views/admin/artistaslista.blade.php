@extends('templates.master')
@section('google-icon')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
@endsection


@section('contenido-principal')
<div class="row d-flex justify-content-center">
    <div class="col-12">
        <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">Usuario</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido</th>
                  <th scope="col">Tipo</th>
                  <th scope="col">Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($cuenta as $cuenta)
                <tr>
                  <th scope="row">{{ $cuenta->user }}</th>
                  <td>{{ $cuenta->nombre }}</td>
                  <td>{{ $cuenta->apellido }}</td>
                  <td>@if($cuenta->perfil_id == 1) Administrador @endif @if($cuenta->perfil_id == 2) Artista @endif</td>
                  <td>
                    <a href="{{route('artistas.index', $cuenta->user)}}" class="btn btn-sm btn-primary pb-0 text-white @if($cuenta->perfil_id == 1) d-none @endif" data-bs-toggle="tooltip" data-bs-title="Editar {{ $cuenta->nombre }}">
                        <span class="material-symbols-outlined">
                            visibility
                        </span>
                    </a>
                    @if(Auth::user()->perfil_id == 1) 
                    <a href="{{route('artistas.index', $cuenta->user)}}" class="btn btn-sm btn-warning pb-0 text-white" data-bs-toggle="tooltip" data-bs-title="Editar {{ $cuenta->nombre }}">
                        <span class="material-symbols-outlined">
                            edit
                        </span>
                    </a>
                     
                    {{-- Borrar Imagenes --}}
                    <button type="button" class="btn btn-sm pb-0 btn-danger @if($cuenta->perfil_id == 1) disabled @endif" data-bs-toggle="modal" data-bs-target="#borrarModal{{$cuenta->user}}">
                      <span class="material-symbols-outlined">
                        delete
                      </span>
                    </button>
                    @endif
                  {{-- Modal Confirmar borrado --}}
                  <div class="modal fade" id="borrarModal{{$cuenta->user}}" tabindex="-1" aria-labelledby="borrarModalLabel{{$cuenta->user}}" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <form method="POST" action="{{route('cuenta.destroy',$cuenta->user)}}">
                                  @method('DELETE')
                                  @csrf
                                  <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="borrarModalLabel{{$cuenta->user}}">Confirmación de Borrado</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      ¿Desea borrar la imagen titulada <span class="text-danger fw-bold">{{$cuenta->user}}</span>?
                                      <hr>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                      <button type="submit" class="btn btn-danger">Borrar Imagen</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
</div>
@endsection