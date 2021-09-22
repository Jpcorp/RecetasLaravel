@extends('layouts.app')

@section('buttons')

    @include('ui.navbarCuentas')

@endsection

@section('content')

    <h2 class="text-center mb-5">Administra los Proveedores</h2>
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">nombre</th>
                    <th scole="col">Descripcion</th>
                    <th scole="col">Telefono</th>
                    <th scole="col">Residencia</th>
                    <th scole="col">acciones</th>
                </tr>
            </thead>
            <tbody>
                @if(count($proveedores) >= 1)
                    @foreach($proveedores ?? '' as $proveedor)
                        <tr>
                            <td>{{ $proveedor->nombre }}</td>
                            <td>{{ $proveedor->descripcion }}</td>
                            <td>{{ $proveedor->tlf }}</td>
                            <td>{{ $proveedor->prestaServicio->nombre }}</td>
                            <td>
                                <a href="{{ route('proveedores.edit', ['proveedor' => $proveedor->id ] ) }}"
                                    class="btn btn-dark b-block w-100 mb-2">Editar</a>
                            </td>
                        <tr>
                    @endforeach
                @else
                    <tr><td colspan="4">No hay datos</td></tr>
                @endif
            </tbody>
        </table>

@endsection
