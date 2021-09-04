@extends('layouts.app')

@section('styles')
@endsection

@section('content')

    <h2 class="text-center mb-5">Crear nueva Residencia</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{ route('residencias.store') }}"  enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre de la residencia</label>

                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                        class="form-control @error('nombre') is-invalid  @enderror"
                        placeholder="nombre residencia" />

                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="direccion">Direccion Residencia</label>

                    <input type="text" name="direccion" id="direccion" value="{{ old('direccion') }}"
                        class="form-control @error('direccion') is-invalid  @enderror"
                        placeholder="direccion residencia" />

                    @error('direccion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="region">Region</label>

                    <select name="region"
                            class="form-control @error('region') is-invalid  @enderror"
                            id="region">

                            <option value="">-- Seleccionar --</option>
                            <option value="RM">RM</option>
                    </select>

                    @error('region')
                        <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Agregar residencia" />

                </div>

        </div>
    </div>


@endsection
