<?php

namespace App\Http\Controllers;

use App\CuentasProveedores;
use App\Proveedor;
use App\Residencias;
use Illuminate\Http\Request;

class CuentasProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $residencias = Residencias::where(['id', 'nombre']);
        $proveedores = Proveedor::where(['id', 'nombre']);
        return view('cuentasProveedores.create', compact('residencias', 'proveedores'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CuentasProveedores  $cuentasProveedores
     * @return \Illuminate\Http\Response
     */
    public function show(CuentasProveedores $cuentasProveedores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CuentasProveedores  $cuentasProveedores
     * @return \Illuminate\Http\Response
     */
    public function edit(CuentasProveedores $cuentasProveedores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CuentasProveedores  $cuentasProveedores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CuentasProveedores $cuentasProveedores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CuentasProveedores  $cuentasProveedores
     * @return \Illuminate\Http\Response
     */
    public function destroy(CuentasProveedores $cuentasProveedores)
    {
        //
    }
}
