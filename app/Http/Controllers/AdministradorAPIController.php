<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bicicleta;

class AdministradorAPIController extends Controller
{
    public function __construct()
    {
        // Todas las rutas de este controlador requieren autenticación
        $this->middleware('auth:api');
    }

    public function getBicicletas() {
        try {
            $bicicleta = Bicicleta::all();
            return response()->json($bicicleta, 201);
        } catch (\Exception $e) {
            return response()->json($e, 400);
        }
    }
}
