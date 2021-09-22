<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\TipoCuentaController;
use App\Http\Controllers\ResidenciasController;
use App\Http\Controllers\CuentasProveedoresController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
    //return "Hola Mundo";
});
*/

//Rutas del sitio web
Route::any('/', [InicioController::class, 'index'])->name('inicio.index');

Route::get('/home', "HomeController@index")->name("home.index");


 Route::get('/recetas', "RecetaController@index")->name("recetas.index");
 Route::get('/recetas/create', "RecetaController@create")->name("recetas.create");
 Route::post('/recetas', "RecetaController@store")->name("recetas.store");
//para ver un objeto tiene q ir con el nombre del modelo, debe ir en singular
 Route::get('recetas/{receta}', "RecetaController@show")->name("recetas.show");
 Route::get('recetas/{receta}/edit', "RecetaController@edit")->name("recetas.edit");
 Route::put('recetas/{receta}', "RecetaController@update")->name("recetas.update");
 Route::delete('recetas/{receta}', "RecetaController@destroy")->name("recetas.destroy");

//Forma abreviada de escribir una ruta (MARAVILLOZA)
//Route::resource('recetas', 'RecetaController');

/** Rutas de perfil */
Route::get('perfiles/{perfil}', "PerfilController@show")->name("perfiles.show");
Route::get('perfiles/{perfil}/edit', "PerfilController@edit")->name("perfiles.edit");
Route::put('perfiles/{perfil}', "PerfilController@update")->name("perfiles.update");

//Almacena los likes de las recetas
Route::post('recetas/like/{receta}', [LikesController::class, 'update'])->name("likes.update");

// Rutas de tipos de cuentas
Route::get('/tipoCtas', [TipoCuentaController::class, 'index'])->name("tiposCtas.index");

Route::get('/residencias/create', [ResidenciasController::class, 'create'])->name("residencias.create");
Route::post('/residencias', [ResidenciasController::class, 'store'])->name('residencias.store');

Route::get('/proveedores/create', [ProveedorController::class, 'create'])->name('proveedores.create');
Route::post('/proveedores', [ProveedorController::class, 'store'])->name('proveedores.store');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/getAllResidencias', [ResidenciasController::class, 'getAllResidencias'])->name('residencias.getAllResidencias');
Route::get('/getCtasPorPagarByMes/{residencia}', [ResidenciasController::class, 'getCtasPorPagarByMes'])->name('residencias.getCtasPorPagarByMes');

Route::get('/cuentasProveedores', [CuentasProveedoresController::class, 'index'])->name('cuentasProveedores.index');
Route::get('/cuentasProveedores/create', [CuentasProveedoresController::class, 'create'])->name('cuentasProveedores.create');
Route::post('/cuentasProveedores', [CuentasProveedoresController::class, 'store'])->name('cuentasProveedores.store');
Route::get('/cuentasProveedores/{cuentasProveedores}/edit', [CuentasProveedoresController::class, 'edit'])->name('cuentasProveedores.edit');
Route::put('cuentasProveedores/{cuentasProveedores}', [CuentasProveedoresController::class, 'update'])->name("cuentasProveedores.update");


Auth::routes();

// para ver usos https://laravel.com/   docs/8.x/controllers
