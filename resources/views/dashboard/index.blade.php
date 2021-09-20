@extends('layouts.app')

@section('styles')
@endsection

@section('buttons')
    {{-- Auth::user() --}}
    @include('ui.navbarCuentas')

@endsection

@section('content')

    <div class="justify-content-left col-12">
        <form method="POST"  enctype="multipart/form-data" class="row g-3" novalidate>
            <div class="col-2">
                <label for="residencia">1.- <small>Elige una residencia para listar:</small></label>
            </div>

            <div class="col-5">

            <elegir-residencia inf="{{ $data }}"></elegir-residencia>

            </div>

        </form>
    </div>

    <div class="justify-content-left col-12">

        <h3>Servicio del mes: [Septiembre] </h3>
        <h4 class="text-success"><small>Tipo de Ctas : [Cuentas por Pagar] </small></h4>

        <div class="col-12">
            <table class="table table-hover table-scrite">
                <thead>
                    <tr>
                        <td width="10px">Identificador</td>
                        <td>Nombre</td>
                        <td>Telefono para consultas</td>
                        <td>Fecha de pago Servicio</td>
                        <td>Descripcion del Servicio</td>
                        <td>Monto del mes</td>
                        <td>Gestionar cuenta</td>
                        <td>Ver detalle de pagos</td>
                    </tr>
                </thead>
                <tbody class="justify-content-center">
                    <tr>
                        <td width="10px">16</td>
                        <td>Enel</td>
                        <td>(56) 223175869</td>
                        <td>20 de cada mes</td>
                        <td>Servicio de electricidad</td>
                        <td>$ 14.990 </td>
                        <td><a href="#" class="btn btn-dark b-block w-100 mb-2">Gestionar</a></td>
                        <td><a href="#" class="btn btn-success b-block w-100 mb-2">Ir</a></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7" class="">Total de mes :</td>
                        <td>$ 200.000</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="justify-content-left col-12">

        <h3>Mes: [Septiembre] </h3>
        <h4 class="text-primary"><small>Tipo de Ctas : [Cuentas por Cobrar] </small></h4>

        <div class="col-12">
            <table class="table table-hover table-scrite">
                <thead>
                    <tr>
                        <td width="10px">Identificador</td>
                        <td>Nombre</td>
                        <td>Telefono para consultas</td>
                        <td>Fecha de pago Servicio</td>
                        <td>Descripcion del Servicio</td>
                        <td>Monto del mes</td>
                        <td>Gestionar cuenta</td>
                        <td>Ver detalle de pagos</td>
                    </tr>
                </thead>
                <tbody class="justify-content-center">
                    <tr>
                        <td width="10px">16</td>
                        <td>Enel</td>
                        <td>(56) 223175869</td>
                        <td>20 de cada mes</td>
                        <td>Servicio de electricidad</td>
                        <td>$ 14.990 </td>
                        <td><a href="#" class="btn btn-info b-block w-100 mb-2 ">Gestionar</a></td>
                        <td><a href="#" class="btn btn-success b-block w-100 mb-2">Ir</a></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7" class="">Total de mes :</td>
                        <td>$ 200.000</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection
