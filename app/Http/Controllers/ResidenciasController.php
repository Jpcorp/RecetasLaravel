<?php

namespace App\Http\Controllers;

use DateTime;
use App\Residencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ResidenciasController extends Controller
{
    //Function para proteger las acciones requieren autenticarse antes
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'getAllResidencias', 'getCtasPorPagarByMes']]);
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
        session(['residenciaId' => $residencia->id]);

        $residenciaId = session('residenciaId');

        //obtener el mes actual
         $monthNow = date("m");

        //obtener el primer dia del mes actual
        $date = new DateTime('now');
        $date->modify('first day of this month');
        $firstdaymonth = $date->format('d');

        //obtener el ultimo dia del mes actual
        $date->modify('last day of this month');
        $lastdaymonth = $date->format('d');

        //obtener las cuentas por pagar del mes actual





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
