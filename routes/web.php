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
Route::get('consultaBicicleta', 'App\Http\Controllers\WelcomeController@consultaBicicleta')->name('welcome.consulta');

// Rutas usuario
Route::get('usuario/{identificacion}', 'App\Http\Controllers\UsuarioController@create')->name('usuario.index');
Route::post('usuario', 'App\Http\Controllers\UsuarioController@store')->name('usuario.store');
Route::get('usuarios/{usuario}/edit', 'App\Http\Controllers\UsuarioController@edit')->name('usuarios.edit');
Route::match(['put', 'patch'], 'usuarios/{usuario}', 'App\Http\Controllers\UsuarioController@update')->name('usuarios.update');

// Rutas bicicleta
Route::get('bicicleta/{identificacion}', 'App\Http\Controllers\BicicletaController@create')->name('bicicleta.index');
Route::post('bicicleta/{identificacion}', 'App\Http\Controllers\BicicletaController@store')->name('bicicleta.store');
Route::get('mostrarBicicletas/{identificacion}', 'App\Http\Controllers\BicicletaController@show')->name('bicicleta.mostrarBicicletasPorId');
Route::get('bicicletas/{bicicleta}/edit', 'App\Http\Controllers\BicicletaController@edit')->name('bicicletas.edit');
Route::match(['put', 'patch'], '/bicicletas/{bicicleta}', 'App\Http\Controllers\BicicletaController@update')->name('bicicletas.update');
Route::match(['put', 'patch'], '/delete/{bicicleta}', 'App\Http\Controllers\BicicletaController@delete')->name('bicicletas.delete');

// Registro completado
Route::get('regCompletado/{bicicleta}', 'App\Http\Controllers\RegCompController@index')->name('registro.index');

// Posiblemente ruta quemada de webService (Eliminar si es el caso)
// Route::get('webService', 'App\Http\Controllers\Soap\SoapController@datosRucEstablecimiento')->name('webservice');

Route::get('consulta/{codRegistro}', 'App\Http\Controllers\BicicletaController@mostrarPorCodigo')->name('bicicleta.consulta');

// Consulta por QR
Route::get('consultaQR/{codRegistro}', 'App\Http\Controllers\BicicletaController@mostrarPorQR')->name('bicicleta.consultaQR');

// Email
// Route::get('send-mail', function() {

//     // try {

//     //     Mail::to('thecristianx@hotmail.com')->send(new \App\Mail\CorreoVerificacion);
//     //     dd('Email ha sido enviado');

//     // } catch (\Exception $e) {

//     //     dd($e->getMessage());
        
//     // }
//     echo(Str::random(10));
    
// });