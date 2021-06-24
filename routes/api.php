<?php

use App\Models\Bicicleta;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Api para Bicicletas
Route::get('bicicletasApi', function(){
    return Bicicleta::all();
});
Route::post('crearBicicletaApi/{identificacion}', 'App\Http\Controllers\BicicletaController@storeApi');

// Api para usuarios
Route::get('usuariosApi', function(){
    return Usuario::all();
});

Route::post('crearUsuarioApi', 'App\Http\Controllers\UsuarioController@storeApi');

// Api para parroquias
Route::get('parroquiasApi', 'App\Http\Controllers\UsuarioController@parroquasApi');