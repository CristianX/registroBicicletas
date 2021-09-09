<?php

use App\Models\Usuario;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// EndPoints para Bicicletas
// Route::get('bicicletas', 'App\Http\Controllers\BicicletaAPIController@mostrarTodo');
Route::get('bicicletas/{identificacion}', 'App\Http\Controllers\BicicletaAPIController@mostrarPorId');
Route::post('crearBicicletaApi/{identificacion}', 'App\Http\Controllers\BicicletaAPIController@storeApi');
Route::put('bicicletas/{bicicleta}', 'App\Http\Controllers\BicicletaAPIController@update');

// EndPoints para usuarios
Route::get('usuariosApi', function(){
    return Usuario::all();
});

Route::post('crearUsuarioApi', 'App\Http\Controllers\UsuarioAPIController@storeApi');

// EndPoints para parroquias
Route::get('parroquiasApi', 'App\Http\Controllers\UsuarioAPIController@parroquasApi');

// EndPint de consulta por código
Route::get('consulta/{codRegistro}', 'App\Http\Controllers\BicicletaAPIController@mostrarPorCodigo');



// **********  Rutas Protegidas **********
// Rutas de usuario
Route::post('login', 'App\Http\Controllers\AuthController@login');
// Borrar despúes de crear un usuario
// Route::post('register', 'App\Http\Controllers\AuthController@create');

// Rutas de Panel de admin
// Usuaios
Route::get('usuarios', 'App\Http\Controllers\AdministradorAPIController@getUsuarios');
// Bicicletas
Route::get('bicicletas', 'App\Http\Controllers\AdministradorAPIController@getBicicletas');
Route::get('bicicletasPendientes', 'App\Http\Controllers\AdministradorAPIController@getBicicletasPendientes');
Route::get('bicicletasEliminadas', 'App\Http\Controllers\AdministradorAPIController@getBicicletasEliminadas');
Route::get('bicicleta/{bicicleta}', 'App\Http\Controllers\AdministradorAPIController@getBicicletaPorId');

Route::put('bicicletaCodigo/{bicicleta}', 'App\Http\Controllers\AdministradorAPIController@putBicicletaPendiente');
Route::put('bicicletaRestaurar/{bicicleta}', 'App\Http\Controllers\AdministradorAPIController@putRestaurarBicicleta');