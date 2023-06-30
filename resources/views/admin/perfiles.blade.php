@extends('templates.master')

@section('contenido-principal')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <table class="table table-striped table-secondary">
                <thead>
                    <tr>
                      <th scope="col">Perfil ID</th>
                      <th scope="col">Tipo</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($perfil as $perfil)
                    <tr>
                      <td>{{ $perfil->id }}</td>
                      <td>{{ $perfil->nombre }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
    </div>
</div>
@endsection