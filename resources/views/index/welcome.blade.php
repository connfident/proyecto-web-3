@extends('templates.master')

@section('contenido-principal')
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

@endsection