<?php

namespace App\Http\Controllers;

use App\Models\Bicicleta;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BicicletaController extends Controller
{
    public function index() {
        return view('bicicleta.mostrarBicicletas')->with([
            'bicicletas' => Bicicleta::all(),
        ]);
    }

    public function create($identificacion) {
        // dd($identificacion);
        return view('bicicleta.index')->with([
            'identificacion' => Usuario::findOrFail($identificacion),
            // Corregir cuando se encuentre solucion a 0 a la izquierda
            'registroIdentificacion' => $identificacion
        ]);
    }

    public function store($identificacion, Request $request) {

        $request->validate([
            'FOTOFRONTAL_BICICLETA' => 'required|image|max:2048',
            'FOTOCOMPLETA_BICICLETA' => 'required|image|max:2048',
            'FOTONUMSERIE_BICICLETA'=> 'required|image|max:2048',
            'FOTOCOMP_BICICLETA'=> 'required|image|max:2048',
        ]);
        $imgFrontal = $request->file('FOTOFRONTAL_BICICLETA')->store('public');
        $imgCompleta = $request->file('FOTOCOMPLETA_BICICLETA')->store('public');
        $imgNumSerie = $request->file('FOTONUMSERIE_BICICLETA')->store('public');
        $imgComponentes = $request->file('FOTOCOMP_BICICLETA')->store('public');

        $urlImgFrontal = Storage::url($imgFrontal);
        $urlImgCompleta = Storage::url($imgCompleta);
        $urlImgNumSerie = Storage::url($imgNumSerie);
        $urlImgComponentes = Storage::url($imgComponentes);
        Bicicleta::create([
            'NUMEROSERIE_BICICLETA' => request()->NUMEROSERIE_BICICLETA,
            'IDENTIFICACION_USUARIO' => $identificacion,
            'MARCA_BICICLETA' => request()->MARCA_BICICLETA,
            'MODELO_BICICLETA' => request()->MODELO_BICICLETA,
            'CATEGORIA_BICICLETA' => request()->CATEGORIA_BICICLETA,
            'TIPOBICICLETA_BICICLETA' => request()->TIPOBICICLETA_BICICLETA,
            'TAMANIO_BICICLETA' => request()->TAMANIO_BICICLETA,
            'COMBCOLORES_BICICLETA' => request()->COMBCOLORES_BICICLETA,
            'ESPEC_BICICLETA' => request()->ESPEC_BICICLETA,
            'FOTOFRONTAL_BICICLETA' => $urlImgFrontal,
            'FOTOCOMPLETA_BICICLETA' => $urlImgCompleta,
            'FOTONUMSERIE_BICICLETA' => $urlImgNumSerie,
            'FOTOCOMP_BICICLETA' => $urlImgComponentes,
        ]);
        
        return redirect()->route('bicicleta.mostrarBicicletas');
    }
}
