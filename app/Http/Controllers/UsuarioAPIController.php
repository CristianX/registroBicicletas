<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

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
        return response()->json($parroquias, 201);
    }
}
