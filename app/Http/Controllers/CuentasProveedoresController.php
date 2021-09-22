<?php

namespace App\Http\Controllers;

use App\Proveedor;
use App\TipoCuenta;
use App\Residencias;
use App\CuentasProveedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CuentasProveedoresController extends Controller
{
     //Function para proteger las acciones requieren autenticarse antes
     public function __construct()
     {
         $this->middleware('auth', ['except' => ['create']]);
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = auth()->user();
        $cuentas = CuentasProveedores::where('user_id', $usuario->id)->paginate(4);
        return view('cuentasProveedores.index')->with('cuentas', $cuentas);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$residencias = Residencias::where(['id', 'nombre']);
        $residencias = Residencias::all(['id', 'nombre']);
        $proveedores = Proveedor::all(['id', 'nombre']);
        $tiposCuentas = TipoCuenta::all(['id', 'nombre']);
        return view('cuentasProveedores.create',
                        compact('residencias', 'proveedores', 'tiposCuentas'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //Validar formulario
        $data = request()->validate([
            'nombre' => 'required|min:6',
            'nmro_cliente' => 'required',
            'dia_pago' => 'required',
            'dia_vencimiento' => 'required',
            'proveedor_id' => 'required',
            'residencia_id' => 'required',
            'tipo_cuenta_id' => 'required',
        ]);

        $user = Auth::user();

        $user->userToServicioProveedor()->create([
            'nombre' => $data['nombre'],
            'nmro_cliente' => $data['nmro_cliente'],
            'dia_pago' => $data['dia_pago'],
            'dia_vencimiento' => $data['dia_vencimiento'],
            'proveedor_id' => $data['proveedor_id'],
            'residencia_id' => $data['residencia_id'],
            'tipo_cuenta_id' => $data['tipo_cuenta_id'],
        ]);

        return redirect()->action('DashboardController@index');
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
        $residencias = Residencias::all(['id', 'nombre']);
        $proveedores = Proveedor::all(['id', 'nombre']);
        $tiposCuentas = TipoCuenta::all(['id', 'nombre']);
        return view('cuentasProveedores.edit',
                    compact('cuentasProveedores', 'residencias', 'proveedores', 'tiposCuentas'));
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
        //validar el formulario
        $data = request()->validate([
            'nombre' => 'required|min:6',
            'nmro_cliente' => 'required',
            'dia_pago' => 'required',
            'dia_vencimiento' => 'required',
            'proveedor_id' => 'required',
            'residencia_id' => 'required',
            'tipo_cuenta_id' => 'required',
        ]);

        //asignar request al modelo
        $cuentasProveedores->nombre = $data['nombre'];
        $cuentasProveedores->nmro_cliente = $data['nmro_cliente'];
        $cuentasProveedores->dia_pago = $data['dia_pago'];
        $cuentasProveedores->dia_vencimiento =  $data['dia_vencimiento'];
        $cuentasProveedores->proveedor_id =  $data['proveedor_id'];
        $cuentasProveedores->residencia_id = $data['residencia_id'];
        $cuentasProveedores->tipo_cuenta_id = $data['tipo_cuenta_id'];

        //insertar en bd
        $cuentasProveedores->save();

        //redireccionar pantalla
        return redirect()->action('DashboardController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CuentasProveedores  $cuentasProveedores
     * @return \Illuminate\Http\Response
     */
    public function destroy(CuentasProveedores $cuentasProveedores)
    {
        $cuentasProveedores->delete();

        return redirect()->action('DashboardController@index');
    }
}
