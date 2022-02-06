@extends('layouts.app')

@section('styles')
@endsection

@section('buttons')
    {{-- Auth::user() --}}
    @include('ui.navbarCuentas')

@endsection

@section('content')

        <elegir-residencia inf="{{ $residencias }}"></elegir-residencia>

@endsection
