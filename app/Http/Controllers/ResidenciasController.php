<?php

namespace App\Http\Controllers;

use App\CuentasProveedores;
use App\Proveedor;
use DateTime;
use App\Residencias;
use App\TipoCuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ResidenciasController extends Controller
{
    //Function para proteger las acciones requieren autenticarse antes
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'getAllResidencias']]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('residencias.create');
    }

    public function getAllResidencias() {
        $residencias = Residencias::all(['id', 'nombre']);
        return $residencias;
    }
    /**
     * obtiene las cuentas por pagar de una residencia
     */
    public function getCtasPorPagarByMes(Residencias $residencia) {
        //Agregar variable a la sesion
        session(['residenciaId' => $residencia->id]);

        //id de la residencia
        $residenciaId = session('residenciaId');

        //obtener el primer dia del mes actual
        $date = new DateTime('now');
        $date->modify('first day of this month');
        $firstDayMonth = $date->format('d');

        //obtener el ultimo dia del mes actual
        $date->modify('last day of this month');
        $lastDayMonth = $date->format('d');

        //obtener el mes
        $monthActual = $date->format('m');

        //obtener el tipo de cuenta: Ctas por pagar
        $ctasxPagar =  $tiposCuentas = TipoCuenta::where('nombre', 'Ctas por pagar')->first();

        //obtener el tipo de cuenta: Ctas por cobrar
        $ctasxCobrar =  $tiposCuentas = TipoCuenta::where('nombre', 'Ctas por cobrar')->first();

        // usuario id
        $usuario = Auth::user();

        // retorno
        $proveedorCtaXpagar = [];
        $proveedores = $residencia->residenciasToProveedor()->get();

        foreach($proveedores as $proveedor) {
            $proveedorCtaXpagar[ Str::slug($proveedor->nombre) ] [] =
            Arr::add(
                ['CuentaProveedor'
                    => CuentasProveedores::whereBetween('dia_pago', [$firstDayMonth, $lastDayMonth])
                            ->where('user_id', $usuario->id)
                            ->where('tipo_cuenta_id', $ctasxPagar->id)
                            ->where('proveedor_id', $proveedor->id)
                            ->where('user_id', $usuario->id)->get()
                ],
                'Proveedor', $proveedor);
        }
        return $proveedorCtaXpagar;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ver tood lo que viene en el request
        //dd($request->all());
        //Validar formulario
        $data = request()->validate([
            'nombre' => 'required|min:6',
            'direccion' => 'required',
            'region' => 'required',
        ]);

        $user = Auth::user();

        /**
        DB::table('residencias')->insert([
            'nombre' => $data['nombre'],
            'direccion' => $data['direccion'],
            'region' => $data['region'],
            'user_id' =>  $id
        ]);
        */

        //Insercion con modelo
        $user->userToResidencias()->create([
            'nombre' => $data['nombre'],
            'direccion' => $data['direccion'],
            'region' => $data['region'],
            'comuna' => 'Santiago',
            //'user_id' =>  $id
        ]);

        return redirect()->action('InicioController@index');
     }
}
