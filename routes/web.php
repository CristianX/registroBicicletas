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
Route::get('bicicletas/{bicicleta}/edit', 'App\Http\Controllers\BicicletaController@edit')->name('bicicletas.edit');
Route::match(['put', 'patch'], '/bicicletas/{bicicleta}', 'App\Http\Controllers\BicicletaController@update')->name('bicicletas.update');


// Registro completado
Route::get('regCompletado/{identificacion}', 'App\Http\Controllers\RegCompController@index')->name('registro.index');

// Web Service
// Route::get('webService', function () {

//     $opts = array(
//         'ssl' => array('ciphers'=>'RC4-SHA', 'verify_peer'=>false, 'verify_peer_name'=>false)
//     );

//     $params = array ('encoding' => 'UTF-8', 'verifypeer' => false, 'verifyhost' => false, 'soap_version' => SOAP_1_2, 'trace' => 1, 'exceptions' => 1, "connection_timeout" => 180, 'stream_context' => stream_context_create($opts) );


//     $url = "http://172.20.47.219/MDMQ_CrecimientoTributario_WS/WS_SRI_PER.asmx?WSDL";
//     try {
//         $client = new SoapClient($url, $params);
//         // dd($client->__getTypes());
//         dd($client->InformacionContribuyente(['ruc' => '0503297079001'])->InformacionContribuyenteResult);
//     } catch(SoapFault $fault) {
//         echo '<br>'.$fault;
//     }
// });
Route::get('webService', 'App\Http\Controllers\Soap\SoapController@datosRucEstablecimiento')->name('webservice');