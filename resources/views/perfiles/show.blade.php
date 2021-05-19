@extends('layouts.app')

@section('content')

{{$perfil->perfilToUser->userToRecetas}}

    <div class="container">
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-7">
                <h2 class="text-center mb-2 text-primary">{{ $perfil->perfilToUser->name }}</h2>
                <a href="{{ $perfil->perfilToUser->url }}" class="">Visitar sitio web</a>
                <div class="biografia">
                    {{!! $perfil->biografia  !!}}
                </div>
            </div>
        </div>



    </div>

@endsection
