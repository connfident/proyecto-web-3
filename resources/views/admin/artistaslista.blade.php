@extends('templates.master')



@section('contenido-principal')
<div class="container min-vh-100">
    <div class="row d-flex justify-content-center">
      <div class="col-12">
          <table class="table table-striped table-secondary">
              <thead>
                  <tr>
                      <th scope="col">Usuario</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Apellido</th>
                      @if(Auth::user()->perfil_id == 1)
                          <th scope="col">Tipo</th>
                      @endif
                      <th scope="col">Opciones</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($cuenta as $cuenta)
                      <tr>
                          @if((Auth::user()->perfil_id == 2 && $cuenta->perfil_id == 2) || Auth::user()->perfil_id == 1)
                              <th scope="row">{{ $cuenta->user }}</th>
                              <td>{{ $cuenta->nombre }}</td>
                              <td>{{ $cuenta->apellido }}</td>
                              @if(Auth::user()->perfil_id == 1)
                                  <td>
                                      @if($cuenta->perfil_id == 1)
                                          Administrador
                                      @endif
                                      @if($cuenta->perfil_id == 2)
                                          Artista
                                      @endif
                                  </td>
                              @endif
                              <td>
                                  <a href="{{route('artistas.index', $cuenta->user)}}" class="btn btn-sm btn-primary pb-0 text-white @if($cuenta->perfil_id == 1) d-none @endif" data-bs-toggle="tooltip" data-bs-title="Editar {{ $cuenta->nombre }}">
                                      <span class="material-symbols-outlined">
                                          visibility
                                      </span>
                                  </a>
                                  @if(Auth::user()->perfil_id == 1)
                                      <button type="button" class="btn btn-sm pb-0 btn-warning @if($cuenta->perfil_id == 1) disabled @endif" data-bs-toggle="modal" data-bs-target="#editarModal{{$cuenta->user}}">
                                          <span class="material-symbols-outlined">
                                              edit
                                          </span>
                                      </button>
                                      {{-- Borrar Imagenes --}}
                                      <button type="button" class="btn btn-sm pb-0 btn-danger @if($cuenta->perfil_id == 1) disabled @endif" data-bs-toggle="modal" data-bs-target="#borrarModal{{$cuenta->user}}">
                                          <span class="material-symbols-outlined">
                                              delete
                                          </span>
                                      </button>
                                  @endif
                              </td>
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
                                              ¿Desea borrar la cuenta llamada <span class="text-danger fw-bold">{{$cuenta->user}}</span>?
                                              <hr>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                              <button type="submit" class="btn btn-danger">Borrar Cuenta</button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                          {{-- Modal Confirmar Edicion --}}
                          <div class="modal fade" id="editarModal{{$cuenta->user}}" tabindex="-1" aria-labelledby="editarModalLabel{{$cuenta->user}}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST" action="{{route('cuentas.update',$cuenta->user)}}">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editarModalLabel{{$cuenta->user}}">Edicion de cuenta</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="nombre" class="col-form-label">Nombre:</label>
                                                <textarea class="form-control" id="nombre" name="nombre"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="apellido" class="col-form-label">Apellido:</label>
                                                <textarea class="form-control" id="apellido" name="apellido"></textarea>
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
                          
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
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
    </div>
</div>
@endsection
