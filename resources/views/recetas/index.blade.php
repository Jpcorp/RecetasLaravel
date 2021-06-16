@extends('layouts.app')

@section('buttons')
    {{-- Auth::user() --}}
    @include('ui.navegacion')

@endsection

@section('content')

    <h2 class="text-center mb-5">Administra tus recetas</h2>

    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Titulo</th>
                    <th scole="col">Categorias</th>
                    <th scole="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if(count($recetas) >= 1)
                    @foreach($recetas ?? '' as $receta)
                        <tr>
                            <td>{{ $receta->titulo }}</td>
                            <td>{{ $receta->categoria->nombre }}</td>
                            <td>
                                <eliminar-receta receta-id={{ $receta->id }}></eliminar-receta>
                                <a href="{{ route('recetas.edit', ['receta' => $receta->id ] ) }}" class="btn btn-dark b-block w-100 mb-2">Editar</a>
                                <!-- a href="{{ action('RecetaController@show', ['receta' => $receta->id ]) }}" class="btn btn-success mr-1">ver</a -->
                                <a href="{{ route('recetas.show', ['receta' => $receta->id ]) }}" class="btn btn-success b-block w-100 mb-2">ver</a>
                            </td>
                        <tr>
                    @endforeach
                @else
                    <tr><td colspan="4">No hay datos</td></tr>
                @endif
            </tbody>
        </table>
        <div class="col-12 mt-4 justify-content-center d-flex">
            {{ $recetas->links() }}
        </div>

    </div>

@endsection
