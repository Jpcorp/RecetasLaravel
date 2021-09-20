<?php

namespace App\Http\Controllers;

use App\Residencias;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * El Inicio de la aplicacion
     */
    public function index()
    {
        $residencias = Residencias::all(['id', 'nombre']);

        //dd($residencias);
        return view('dashboard.index')->with('data', $residencias);


    }
}
