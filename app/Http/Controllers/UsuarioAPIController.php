<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Controllers\Soap_Personas\SoapPersonasController;

class UsuarioAPIController extends Controller
{
    // Backend de Api

    public function storeApi() {
        try {
            $usuario = Usuario::create(request()->all());
            return response()->json($usuario, 201);
        } catch (\Exception $e) {
            return response()->json($e, 400);
        }
    }

    public function parroquasApi() {
        $parroquias = [
            'Belisario Quevedo',
            'El Inca',
            'Carcelén',
            'Centro Histórico',
            'Chilibulo',
            'Chillogallo',
            'Chimbacalle',
            'Cochapamba',
            'Comité del Pueblo',
            'Concepción',
            'Cotocollao',
            'El Condado',
            'Magdalena',
            'Guamaní',
            'Iñaquito',
            'Itchimbía',
            'Jipijapa',
            'Kennedy',
            'La Argelia',
            'La Ecuatoriana',
            'La Ferroviaria',
            'La Libertad',
            'La Mena',
            'Mariscal Sucre',
            'Ponceano',
            'Puengasí',
            'Quitumbe',
            'Rumipamba',
            'San Bartolo',
            'San Juan',
            'Solanda',
            'Turubamba',
            'Alangasí',
            'Amaguaña',
            'Atahualpa',
            'Calacalí',
            'Calderón',
            'Conocoto',
            'Cumbayá',
            'Chavezpamba',
            'Checa',
            'El Quinche',
            'Gualea',
            'Guangopolo',
            'Guayllabamba',
            'La Merced',
            'Llano Chico',
            'Lloa',
            'Nanegal',
            'Nanegalito',
            'Nayón',
            'Nono',
            'Pacto',
            'Perucho',
            'Pifo',
            'Píntag',
            'Pomasqui',
            'Puéllaro',
            'Puembo',
            'San Antonio de Pichincha',
            'San José de Minas',
            'Tababela',
            'Tumbaco',
            'Yaruquí',
            'Zámbisa',
        ];
        return response()->json($parroquias, 200);
    }

    public function datosPersonas($identificacion) {
        // Web Service personas
        $soapPersonasController = new SoapPersonasController();
        $datosPersonales = $soapPersonasController->getFichaGeneral($identificacion);
        // $datosPersonales = $soapPersonasController->getFichaGeneral($identificacion);
        // dd($datosPersonales);

        if(!$datosPersonales) {
            return response()->json(Config::get('errormessages.GETDATA_USUARIO'), 400);
        }

        $cedula = $datosPersonales[0]->valor;
        $nacionalidad = ($datosPersonales[2]->valor === 'CIUDADANO') ? 'Ecuatoriano' : 'Extranjero';
        $nombre = $datosPersonales[1]->valor;

        $fechaNacimiento = $datosPersonales[3]->valor;
        $fechaNacimiento = strtr($fechaNacimiento, '/', '-');

        $apellidoMaterno = explode(' ', $nombre)[1];
        $apellidoPaterno = explode(' ', $nombre)[0];
        $primerNombre = explode(' ', $nombre)[2];
        $segundoNombre = explode(' ', $nombre)[3];

        return response()->json([
            'cedula' => $cedula,
            'primerNombre' => $primerNombre,
            'segundoNombre' => $segundoNombre,
            'apellidoPaterno' => $apellidoPaterno,
            'apellidoMaterno' => $apellidoMaterno,
            'fechaNacimiento' => $fechaNacimiento,
            'nacionalidad' => $nacionalidad,
        ], 200);
    }
}
