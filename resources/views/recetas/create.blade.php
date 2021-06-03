@extends('layouts.app')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css"
          integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg=="
          crossorigin="anonymous" />

@endsection

@section('buttons')
    <a href="{{ route('recetas.index') }}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 icono" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
          </svg>
        volver
    </a>
@endsection

@section('content')

    <h2 class="text-center mb-5">Crear nueva receta</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
        <form method="POST" action="{{ route('recetas.store') }}" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="form-group">
                <label for="titulo">Titulo Receta</label>

            <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}"
                    class="form-control @error('titulo') is-invalid  @enderror"
                    placeholder="Titulo Receta" />

                @error('titulo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group">
                <label for="categorias">Categoria</label>

                <select name="categoria"
                        class="form-control @error('categoria') is-invalid  @enderror"
                        id="categoria">

                        <option value="">-- Seleccionar --</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}"
                                {{ old('categoria') == $categoria->id ? 'selected' : '' }}
                                >{{ $categoria->nombre }}</option>
                        @endforeach

                </select>

                @error('categoria')
                    <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="preparacion">Preparacion</label>

                <input type="hidden" name="preparacion" id="preparacion" value="{{ old('preparacion') }}" />
                <trix-editor input="preparacion"
                             class="form-control @error('preparacion') is-invalid  @enderror"
                             ></trix-editor>

                @error('preparacion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group mt-3">
                <label for="ingredientes">Ingredientes</label>

                <input type="hidden" name="ingredientes" id="ingredientes" value="{{ old('ingredientes') }}">
                <trix-editor input="ingredientes"
                             class="form-control @error('ingredientes') is-invalid  @enderror"
                             ></trix-editor>

                @error('ingredientes')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group">
                <label for="imagen">Imagen</label>

                <input type="file"
                       class="form-control @error('imagen') is-invalid  @enderror"
                       name="imagen" id="imagen" value=""  />

                @error('imagen')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Agregar Receta" />

            </div>

        </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"
            integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ=="
            crossorigin="anonymous" defer>
    </script>

@endsection
