@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css">

@endsection

@section('content')

    <h2 class="text-center mb-5">Crear nueva Cuenta Proveedor</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{ route('cuentasProveedores.store') }}"  enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre de la cuenta</label>

                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                        class="form-control @error('nombre') is-invalid  @enderror"
                        placeholder="nombre cuenta" />

                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="NmroCliente">Nro de cliente</label>

                    <input type="text" name="nmro_cliente" id="nmro_cliente" value="{{ old('nmro_cliente') }}"
                        class="form-control @error('nmro_cliente') is-invalid  @enderror"
                        placeholder="Nro de Cliente" />

                    @error('nmro_cliente')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="dia">Dia de pago</label>

                    <input type="text" name="dia_pago" id="dia_pago" value="{{ old('dia_pago') }}"
                        class="form-control @error('dia_pago') is-invalid  @enderror"
                        placeholder="Dia de pago" />

                    @error('dia_pago')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror

                    <label for="dia_vencimiento">Dia de Vencimiento</label>

                    <input type="text" name="dia_vencimiento" id="dia_vencimiento" value="{{ old('dia_vencimiento') }}"
                        class="form-control dayOfMonth  @error('dia_vencimiento') is-invalid  @enderror"
                        placeholder="Dia de Vencimiento" />

                    @error('dia_vencimiento')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror

                </div>


                <div class="form-group">
                    <label for="datetimepicker">Prueba de fecha</label>
                    <input type='text' class="form-control dayOfMonth" id="datetimepicker" name="datetimepicker" />
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>

                </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection
