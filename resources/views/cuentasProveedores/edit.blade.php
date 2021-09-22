@extends('layouts.app')

@section('content')

    <h2 class="text-center mb-5">Editar Servicio</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{ route('cuentasProveedores.store') }}"  enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre del Servicio</label>

                    <input type="text" name="nombre" id="nombre" value="{{ $cuentasProveedores->nombre }}"
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

                    <input type="text" name="nmro_cliente" id="nmro_cliente" value="{{ $cuentasProveedores->nmro_cliente }}"
                        class="form-control @error('nmro_cliente') is-invalid  @enderror"
                        placeholder="Nro de Cliente" />

                    @error('nmro_cliente')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="Dia de pago">Dia de pago</label>

                    <input type="text" name="dia_pago" id="dia_pago" value="{{ $cuentasProveedores->dia_pago }}"
                        class="form-control dayOfMonth @error('dia_pago') is-invalid  @enderror"
                        placeholder="Dia de pago" />

                    @error('dia_pago')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror

                    <label for="dia_vencimiento">Dia de Vencimiento</label>

                    <input type="text" name="dia_vencimiento" id="dia_vencimiento" value="{{ $cuentasProveedores->dia_vencimiento }}"
                        class="form-control dayOfMonth  @error('dia_vencimiento') is-invalid  @enderror"
                        placeholder="Dia de Vencimiento" />

                    @error('dia_vencimiento')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="Proveedor">Compañia Servicio</label>

                    <select name="proveedor_id"
                            class="form-control @error('proveedor_id') is-invalid  @enderror"
                            id="proveedor_id">

                            <option value="">-- Seleccionar --</option>
                            @foreach($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}"
                                    {{ $cuentasProveedores->proveedor_id == $proveedor->id ? 'selected' : '' }}
                                    >{{ $proveedor->nombre }}</option>
                            @endforeach

                    </select>

                    @error('proveedor_id')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="residencia_id">Residencia Servicio</label>

                    <select name="residencia_id"
                            class="form-control @error('residencia_id') is-invalid  @enderror"
                            id="proveedor_id">

                            <option value="">-- Seleccionar --</option>
                            @foreach($residencias as $residencia)
                                <option value="{{ $residencia->id }}"
                                    {{ $cuentasProveedores->residencia_id == $residencia->id ? 'selected' : '' }}
                                    >{{ $residencia->nombre }}</option>
                            @endforeach

                    </select>

                    @error('proveedor_id')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tipo_cuenta_id">Tipo de Cuenta</label>

                    <select name="tipo_cuenta_id"
                            class="form-control @error('tipo_cuenta_id') is-invalid  @enderror"
                            id="tipo_cuenta_id">

                            <option value="">-- Seleccionar --</option>
                            @foreach($tiposCuentas as $tipoCuenta)
                                <option value="{{ $tipoCuenta->id }}"
                                    {{ $cuentasProveedores->tipo_cuenta_id == $tipoCuenta->id ? 'selected' : '' }}
                                    >{{ $tipoCuenta->nombre }}</option>
                            @endforeach

                    </select>

                    @error('tipo_cuenta_id')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Actualizar servicio" />
                </div>
        </div>
    </div>




@endsection
