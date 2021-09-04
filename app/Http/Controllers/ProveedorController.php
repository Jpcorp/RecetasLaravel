<?php

namespace App\Http\Controllers;

use App\Proveedor;
use App\Residencias;
use Illuminate\Http\Request;
use Malahierba\ChileRut\ChileRut;
use Malahierba\ChileRut\Rules\ValidChileanRut;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth', ['except' => ['show']]);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $residencias = Residencias::all(['id', 'nombre']);
        return view('proveedores.create', compact('residencias'));
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
        //dd($request->all());

        //valido la informacion entregada
        $data = $request->validate([
            'nombre' => 'required',
            'rut' => ['required', 'string', new ValidChileanRut(new ChileRut)],
            'direccion' => 'min:6',
            'tlf' => 'required',
            'comuna' => 'required',
            'region' => 'required',
            'residencia' => 'required',
            'giro' => 'required',
            'descripcion' => 'required',
        ]);

        auth()->user()->userToProveedor()->create([
            'nombre' => $data['nombre'],
            'rut' => $data['rut'],
            'direccion' => $data['direccion'],
            'tlf' => $data['tlf'],
            'comuna' => $data['comuna'],
            'region' => $data['region'],
            'residencias_id' => $data['residencia'],
            'giro' => $data['giro'],
            'descripcion' => $data['descripcion'],
        ]);

        return redirect()->action('RecetaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        //
    }
}
