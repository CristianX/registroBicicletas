<?php

namespace App\Http\Controllers;

use App\Models\Bicicleta;
use Illuminate\Http\Request;

class BicicletaController extends Controller
{
    public function index() {
        return view('bicicleta.mostrarBicicletas')->with([
            'bicicletas' => Bicicleta::all(),
        ]);
    }

    public function create() {
        return view('bicicleta.index');
    }

    public function store() {
        $bicicleta = Bicicleta::create([
            'NUMEROSERIE_BICICLETA' => request()->NUMEROSERIE_BICICLETA,
            'IDENTIFICACION_USUARIO' => '0503297079',
            'MARCA_BICICLETA' => request()->MARCA_BICICLETA,
            'MODELO_BICICLETA' => request()->MODELO_BICICLETA,
            'CATEGORIA_BICICLETA' => request()->CATEGORIA_BICICLETA,
            'TIPOBICICLETA_BICICLETA' => request()->TIPOBICICLETA_BICICLETA,
            'TAMANIO_BICICLETA' => request()->TAMANIO_BICICLETA,
            'COMBCOLORES_BICICLETA' => request()->COMBCOLORES_BICICLETA,
            'ESPEC_BICICLETA' => request()->ESPEC_BICICLETA
        ]);
        return view('bicicleta.mostrarBicicletas')->with([
            'bicicletas' => Bicicleta::all(),
        ]);
    }
}
