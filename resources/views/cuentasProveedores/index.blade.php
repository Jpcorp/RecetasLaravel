@extends('layouts.app')

@section('buttons')

    @include('ui.navbarCuentas')

@endsection

@section('content')

<h2 class="text-center mb-5">Administra los servicios</h2>

<div class="col-md-10 mx-auto bg-white p-3">
    <table class="table">
        <thead class="bg-primary text-light">
            <tr>
                <th scole="col">nombre</th>
                <th scole="col">Proveedor de servicio</th>
                <th scole="col">dia de pago y de vencimiento</th>
                <th scole="col">Ver mas</th>
            </tr>
        </thead>
        <tbody>
            @if(count($cuentas) >= 1)
                @foreach($cuentas ?? '' as $cuenta)
                    <tr>
                        <td>{{ $cuenta->nombre }}</td>
                        <td>{{ $cuenta->tieneProveedor->nombre }}</td>
                        <td>{{ 'Dia pago '.$cuenta->dia_pago. ' y vence '.$cuenta->dia_vencimiento. ' cada mes' }}</td>
                        <td>
                            <a href="{{ route('cuentasProveedores.edit', ['cuentasProveedores' => $cuenta->id ] ) }}"
                               class="btn btn-dark b-block w-100 mb-2">Editar</a>
                            <eliminar-servicio servicio-id={{ $cuenta->id }}></eliminar-servicio>
                        </td>
                    <tr>
                @endforeach
            @else
                <tr><td colspan="4">No hay datos</td></tr>
            @endif
        </tbody>
    </table>


@endsection
