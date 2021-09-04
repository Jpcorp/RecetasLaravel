<?php

namespace App\Http\Controllers;

use App\Residencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ResidenciasController extends Controller
{
    //Function para proteger las acciones requieren autenticarse antes
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
        //
        return view('residencias.create');
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
