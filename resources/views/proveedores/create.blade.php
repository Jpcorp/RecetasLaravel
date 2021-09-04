@extends('layouts.app')

@section('styles')

@endsection

@section('scripts')
<script type="text/javascript">
</script>

@endsection

@section('content')

<h2 class="text-center mb-5">Crear nuevo Proveedor</h2>

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form method="POST" action="{{ route('proveedores.store') }}"  enctype="multipart/form-data" novalidate>
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre de Proveedor</label>

                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                    class="form-control @error('nombre') is-invalid  @enderror"
                    placeholder="nombre proveddor" />

                @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group">
                <label for="rut">Rut</label>

                <input-rut/>

                @error('rut')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group">
                <label for="tlf">Telefono del Proveedor</label>

                <input type="text" name="tlf" id="tlf" value="{{ old('tlf') }}"
                    class="form-control @error('tlf') is-invalid  @enderror"
                    placeholder="telefono proveddor" />

                @error('tlf')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group">
                <label for="direccion">Direccion del Proveedor</label>

                <input type="text" name="direccion" id="direccion" value="{{ old('direccion') }}"
                    class="form-control @error('direccion') is-invalid  @enderror"
                    placeholder="Direccion proveddor" />

                @error('direccion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group">
                <label for="comuna">Comuna del Proveedor</label>

                <select name="comuna"
                    class="form-control
                    @error('comuna') is-invalid  @enderror" id="comuna">

                    <option value="">-- Seleccionar --</option>
                    <option value="Santiago">Santiago</option>
                </select>

                @error('comuna')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group">
                <label for="region">Region del Proveedor</label>

                <select name="region"
                    class="form-control
                    @error('region') is-invalid  @enderror" id="region">

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
                <label for="residencia">Residencia que provee el servicio</label>

                <select name="residencia"
                        class="form-control @error('residencia') is-invalid  @enderror"
                        id="residencia">

                        <option value="">-- Seleccionar --</option>
                        @foreach($residencias as $residencia)
                            <option value="{{ $residencia->id }}"
                                {{ old('residencia') == $residencia->id ? 'selected' : '' }}
                                >{{ $residencia->nombre }}</option>
                        @endforeach

                </select>

                @error('residencia')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="giro">Giro del Proveedor</label>

                <input type="text" name="giro" id="giro" value="{{ old('giro') }}"
                    class="form-control @error('giro') is-invalid  @enderror"
                    placeholder="giro proveddor" />

                @error('giro')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group">
                <label for="descripcion">Descripcion del Proveedor</label>

                <input type="text" name="descripcion" id="descripcion" value="{{ old('descripcion') }}"
                    class="form-control @error('descripcion') is-invalid  @enderror"
                    placeholder="descripcion proveddor" />

                @error('descripcion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Agregar proveedor" />

            </div>

    </div>
</div>


@endsection


