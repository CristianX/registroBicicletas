<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bicicleta;
use App\Models\usuario;

class AdministradorAPIController extends Controller
{
    public function __construct()
    {
        // Todas las rutas de este controlador requieren autenticación
        $this->middleware('auth:api');
    }

    // ***************** Funciones de usaurios *****************
    public function getUsuarios() {
        try {
            $usuarios = usuario::all();
            return response()->json($usuarios, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    // ***************** Funciones de bicicletas *****************
    public function getBicicletas() {
        try {
            $bicicletas = Bicicleta::all();
            return response()->json($bicicletas, 200);
        } catch (\Exception $e) {
            return response()->json($e, 400);
        }
    }

    public function getBicicletasPendientes() {
        try {
            $bicicletas = Bicicleta::where('CODREGISTRO_BICICLETA', 'Pendiente')->get();
            return response()->json($bicicletas, 200);
        } catch (\Exception $e) {
            return response()->json($e, 400);
        }
    }

    public function getBicicletasEliminadas() {
        try {
            $bicicletas = Bicicleta::where('ESTADO_BICICLETA', 0)->get();
            return response()->json($bicicletas, 200);
        } catch (\Exception $e) {
            return response()->json($e, 400);
        }
    }

    public function putBicicletaPendiente( $bicicleta ) {
        $bicicleta = Bicicleta::findOrFail($bicicleta);

        try {
            $bicicleta->update([
                'CODREGISTRO_BICICLETA' => request()->CODREGISTRO_BICICLETA,
            ]);
            return response()->json('Código asignado correctamente', 201);
        } catch (\Exception $e) {
            return response()->json($e, 400);
        }

    }

    public function getBicicletaPorId($bicicleta) {
        try {
            $bicicleta = Bicicleta::findOrFail($bicicleta);
            return response()->json([
                // 'bicicleta' => $bicicleta,
                // 'foto frontal' => asset($bicicleta->FOTOFRONTAL_BICICLETA),
                'id' => $bicicleta->id,
                'NUMEROSERIE_BICICLETA' => $bicicleta->NUMEROSERIE_BICICLETA,
                'IDENTIFICACION_USUARIO' => $bicicleta->IDENTIFICACION_USUARIO,
                'MARCA_BICICLETA' => $bicicleta->MARCA_BICICLETA,
                'MODELO_BICICLETA' => $bicicleta->MODELO_BICICLETA,
                'CATEGORIA_BICICLETA' => $bicicleta->CATEGORIA_BICICLETA,
                'TIPOBICICLETA_BICICLETA' => $bicicleta->TIPOBICICLETA_BICICLETA,
                'TAMANIO_BICICLETA' => $bicicleta->TAMANIO_BICICLETA,
                'COMBCOLORES_BICICLETA' => $bicicleta->COMBCOLORES_BICICLETA,
                'ESPEC_BICICLETA' => $bicicleta->ESPEC_BICICLETA,
                'FOTOFRONTAL_BICICLETA' => asset($bicicleta->FOTOFRONTAL_BICICLETA),
                'FOTOCOMPLETA_BICICLETA' => asset($bicicleta->FOTOCOMPLETA_BICICLETA),
                'FOTONUMSERIE_BICICLETA' => $bicicleta->FOTONUMSERIE_BICICLETA != null ? asset($bicicleta->FOTONUMSERIE_BICICLETA) : null,
                'FOTOCOMP_BICICLETA' => $bicicleta->FOTOCOMP_BICICLETA != null ? asset($bicicleta->FOTOCOMP_BICICLETA) : null,
                'APODERADO_BICICLETA' => $bicicleta->APODERADO_BICICLETA,
                'RAZONSOCIAL_BICICLETA' => $bicicleta->RAZONSOCIAL_BICICLETA,
                'RUC_BICICLETA' => $bicicleta->RUC_BICICLETA,
                'FOTOFACTURA_BICICLETA' => $bicicleta->FOTOFACTURA_BICICLETA != null ? asset($bicicleta->FOTOFACTURA_BICICLETA) : null,
                'DESCUSADA_BICICLETA' => $bicicleta->DESCUSADA_BICICLETA,
                'NOMBUSADA_BICICLETA' => $bicicleta->NOMBUSADA_BICICLETA,
                'ACTIVAROBADA_BICICLETA' => $bicicleta->ACTIVAROBADA_BICICLETA,
                'FOTODENUNCIA_BICICLETA' => $bicicleta->FOTODENUNCIA_BICICLETA != null ? asset($bicicleta->FOTODENUNCIA_BICICLETA) : null,
                'CODREGISTRO_BICICLETA' => $bicicleta->CODREGISTRO_BICICLETA,
                'ESTADO_BICICLETA' => $bicicleta->ESTADO_BICICLETA,
            ], 200);
        } catch (\Exception $e) {
            return response()->json($e, 400);
        }
    }
    
    public function putRestaurarBicicleta($bicicleta) {

        $bicicleta = Bicicleta::findOrFail($bicicleta);

        try {
            $bicicleta->update([
                'ESTADO_BICICLETA' => 1,
            ]);
            return response()->json('Bicicleta restaurada correctamente', 201);
        } catch (\Exception $e) {
            return response()->json($e, 400);
        }
    }
}
