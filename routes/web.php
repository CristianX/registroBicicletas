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
// Inicio
Route::get('/', 'App\Http\Controllers\WelcomeController@index')->name('welcome');
Route::get('mostrarFormBicicleta', 'App\Http\Controllers\WelcomeController@pasarRegBIcicletas')->name('welcome.pasarRegBIcicletas');

// Rutas usuario
Route::get('mostrarUsuarios', 'App\Http\Controllers\UsuarioController@index')->name('usuario.mostrarUsuarios');
Route::get('usuario', 'App\Http\Controllers\UsuarioController@create')->name('usuario.index');
Route::post('usuario', 'App\Http\Controllers\UsuarioController@store')->name('usuario.store');

// Rutas bicicleta
Route::get('mostrarBicicletas', 'App\Http\Controllers\BicicletaController@index')->name('bicicleta.mostrarBicicletas');
Route::get('bicicleta/{identificacion}', 'App\Http\Controllers\BicicletaController@create')->name('bicicleta.index');
Route::post('bicicleta/{identificacion}', 'App\Http\Controllers\BicicletaController@store')->name('bicicleta.store');
Route::get('mostrarBicicletas/{identificacion}', 'App\Http\Controllers\BicicletaController@show')->name('bicicleta.mostrarBicicletasPorId');


// Registro completado
Route::get('regCompletado', 'App\Http\Controllers\RegCompController@index')->name('registro.index');