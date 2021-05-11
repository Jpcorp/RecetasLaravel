@extends('layouts.app')

@section('buttons')
    <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2">volver</a>
@endsection

@section('content')

    {{-- $receta --}}

    <article class="contenido-receta">
        <h1 class="text-center mb-4">{{ $receta->titulo }}</h1>
        <div class="receta-meta">

            <div class="imagen receta">
                <img src="/storage/{{ $receta->imagen }}" class="w-100">
            </div>

            <p>
                <span class="font-weight-bold text-primary mb-2">Escrito en:</span>
                {{ $receta->categoria->nombre }}
            </p>
            <p>
                <span class="font-weight-bold text-primary mb-2">Fecha:</span>
                @php
                    $fecha = $receta->created_at
                @endphp
                <fecha-receta fecha="{{ $fecha }}"></fecha-receta>
            </p>
            <p>
                <span class="font-weight-bold text-primary">Autor:</span>
                {{-- TODO: mostrar el usuario --}}

                {{ $receta->autor->name }}
            </p>

            <p>
                <span class="font-weight-bold text-primary">Ingredientes:</span>
                {!! $receta->ingredientes !!}
            </p>
            <p>
                <span class="font-weight-bold text-primary">preparacion:</span>
                {!! $receta->preparacion !!}
            </p>
        </div>
    </article>


@endsection
