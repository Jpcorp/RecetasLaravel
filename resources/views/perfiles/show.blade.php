@extends('layouts.app')

@section('buttons')
    <a href="{{ route('recetas.index') }}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 icono" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
          </svg>
        volver
    </a>
@endsection

@section('content')

    {{--$perfil->perfilToUser->userToRecetas--}}

    <div class="container">
        <div class="row">
            <div class="col-md-5">
                @if($perfil->imagen)
            <img src="/storage/{{ $perfil->imagen }}" class="w-100 rounded-circle" alt="Imagen chef" />
                @endif
            </div>
            <div class="col-md-7 mt-5 mt-md-0">
                <h2 class="text-center mb-2 text-primary">{{ $perfil->perfilToUser->name }}</h2>
                <a href="{{ $perfil->perfilToUser->url }}" class="">Visitar sitio web</a>
                <div class="biografia">
                    {!! $perfil->biografia  !!}
                </div>
            </div>
        </div>
    </div>

@endsection

