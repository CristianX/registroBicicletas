<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Soap_Personas\SoapPersonasController;

class UsuarioController extends Controller
{
    public function index() {
        // $usuarios = Usuario::all();
        // // dd($usuarios);
        return view('usuario.mostrarUsuarios')->with([
            'usuarios' => Usuario::all(),
        ]);
    }

    public function parroquias() {
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

        return $parroquias;
    }

    

    public function create($identificacion) {

        //TODO: Rellenar datos de usuario
        // Web Service personas
        $soapPersonasController = new SoapPersonasController();
        $datosPersonales = $soapPersonasController->getFichaGeneral($identificacion);
        // $datosPersonales = $soapPersonasController->getFichaGeneral($identificacion);
        // dd($datosPersonales);

        if(!$datosPersonales) {
            return back()->withError(Config::get('errormessages.GETDATA_USUARIO'))->withInput();
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
        // dd($fechaNacimientoFormat);

        // dd($datosPersonales[1]->valor);

        return view('usuario.index')->with([
            'parroquias' => $this->parroquias(),

            'cedula' => $cedula,
            'primerNombre' => $primerNombre,
            'segundoNombre' => $segundoNombre,
            'apellidoPaterno' => $apellidoPaterno,
            'apellidoMaterno' => $apellidoMaterno,
            'fechaNacimiento' => $fechaNacimiento,
            'nacionalidad' => $nacionalidad,
        ]);
    }

    public function store() {

        try {
            Usuario::create(request()->all());
            //TODO: Checar la línea 27
            $identificacion = request()->get('IDENTIFICACION_USUARIO');
        } catch (\Exception $e) {
            dd($e);
            return back()->withError(Config::get('errormessages.POSTERROR_USUARIO'))->withInput();
        }
        
        return redirect()->route('bicicleta.index', [$identificacion]);
        
    }
    
    public function edit($usuario) {
        // TODO: añadir try catch

        $usuarioProv = Usuario::findOrFail($usuario);
        return view('usuario.edit')->with([
            'identificacion' => $usuario,
            'usuario' => Usuario::findOrFail($usuario),
            'parroquias' => $this->parroquias(),
        ]);
    }

    public function update($usuario) {

        $usuarioProv = Usuario::findOrFail($usuario);

        try {
            $usuarioProv->update([
                'EDAD_USUARIO' => request()->EDAD_USUARIO,
                'EMAIL_USUARIO' => request()->EMAIL_USUARIO,
                'TELFCELULAR_USUARIO' => request()->TELFCELULAR_USUARIO,
                'PARROQUIARES_USUARIO' => request()->PARROQUIARES_USUARIO,
                'BARRIORES_USUARIO' => request()->BARRIORES_USUARIO,
            ]);
        } catch (\Exception $e) {
            return back()->withError(Config::get('errormessages.PUTERROR_USUARIO'))->withInput();
        }

        
        return redirect()->route('bicicleta.mostrarBicicletasPorId', [$usuario]);
    }

}
