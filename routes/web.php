<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Rutas usuario
Route::get('usuario', 'App\Http\Controllers\UsuarioController@index')->name('usuario.index');

// Rutas bicicleta
Route::get('bicicleta', 'App\Http\Controllers\BicicletaController@index')->name('bicicleta.index');

