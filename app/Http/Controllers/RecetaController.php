<?php

namespace App\Http\Controllers;

use App\CategoriaReceta;
use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller
{
    //Function para proteger las acciones requieren autenticarse antes
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $recetas = auth()->user()->userToRecetas;

        return view("recetas.index")->with('recetas', $recetas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // DB::table('categoria_receta')->get()->pluck('nombre', 'id')->dd();
        // Obtener las categorias sin modelo
        //$categorias = DB::table('categoria_recetas')->get()->pluck('nombre', 'id');

        //con modelo
        $categorias = CategoriaReceta::all(['id', 'nombre']);

        return view("recetas.create")->with('categorias', $categorias );
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
            'titulo' => 'required|min:6',
            'categoria' => 'required',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'imagen' => 'required|image',
        ]);

        //obtener la imagen
        $url_imagen = $request['imagen']->store('uploads-recetas', 'public');

        //Resize image
        $img = Image::make( public_path("storage/{$url_imagen}"))->fit(1000, 500);
        $img->save();

        //almacenar datos sin modelo
        // DB::table('recetas')->insert([
        //     'titulo' => $data['titulo'],
        //     'ingredientes' => $data['ingredientes'],
        //     'imagen' => $url_imagen,
        //     'user_id' => Auth::user()->id,
        //     'categoria_id' => $data['categoria'],
        //     'preparacion' => $data['preparacion'],
        // ]);

        //a lmacenar en la base de datos con modelo
        auth()->user()->userToRecetas()->create([
            'titulo' => $data['titulo'],
            'ingredientes' => $data['ingredientes'],
            'imagen' => $url_imagen,
            'categoria_id' => $data['categoria'],
            'preparacion' => $data['preparacion'],
        ]);

        return redirect()->action('RecetaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        //algunos metodos para obtener los datos
        //$receta = Receta::find($receta);
        //si no lo encuentra marca como error
        //$receta = Receta::findOrFail($receta);
        //return view("recetas.show")->with('receta', $receta); //de forma automatica busca la vista

        //forma mas abreviada de mostrar data
        return view("recetas.show", compact('receta'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //
    }
}
