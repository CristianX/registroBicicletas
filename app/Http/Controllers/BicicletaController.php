<?php

namespace App\Http\Controllers;

use App\Models\Bicicleta;
use App\Models\Usuario;
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
        try {
            return view('bicicleta.index')->with([
                'identificacion' => Usuario::findOrFail($identificacion),
                // Problema de 0 a la izquierda
                'registroIdentificacion' => $identificacion
            ]);
        } catch (\Exception $e) {
            return redirect()->route('usuario.index');
        }
        
    }

    public function store($identificacion) {

        //TODO: en caso de aceptar 
        // $nombre = request()->get('NOMBREDUENIO_BICICLETA');
        // if($nombre === null) {
        //     $usuario = usuario::findOrFail($identificacion);
        //     return $usuario;
        // }



        request()->validate([
            'FOTOFRONTAL_BICICLETA' => 'required|image|max:2048',
            'FOTOCOMPLETA_BICICLETA' => 'required|image|max:2048',
            'FOTONUMSERIE_BICICLETA'=> 'required|image|max:2048',
            'FOTOCOMP_BICICLETA'=> 'required|image|max:2048',
        ]);
        $imgFrontal = request()->file('FOTOFRONTAL_BICICLETA')
            ->store('public/'.$identificacion.'/'.request()->get('NUMEROSERIE_BICICLETA'));
        $imgCompleta = request()->file('FOTOCOMPLETA_BICICLETA')
            ->store('public/'.$identificacion.'/'.request()->get('NUMEROSERIE_BICICLETA'));
        $imgNumSerie = request()->file('FOTONUMSERIE_BICICLETA')
            ->store('public/'.$identificacion.'/'.request()->get('NUMEROSERIE_BICICLETA'));
        $imgComponentes = request()->file('FOTOCOMP_BICICLETA')
            ->store('public/'.$identificacion.'/'.request()->get('NUMEROSERIE_BICICLETA'));

        $urlImgFrontal = Storage::url($imgFrontal);
        $urlImgCompleta = Storage::url($imgCompleta);
        $urlImgNumSerie = Storage::url($imgNumSerie);
        $urlImgComponentes = Storage::url($imgComponentes);

        try {
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
            
            
        } catch (\Exception $e) {
            // Storage::deleteDirectory('public/'.$identificacion.'/'.request()->get('NUMEROSERIE_BICICLETA')); 
            Storage::delete($urlImgFrontal);
            Storage::delete($imgCompleta);
            Storage::delete($imgNumSerie);
            Storage::delete($imgComponentes);
            return back()->withError("Bicicleta registrada anteriormente")->withInput();
        }

        return redirect()->route('registro.index');

        
    }

    // Rutas para API
    // TODO: Eliminar código repetido

    public function storeApi($identificacion) {

        request()->validate([
            'FOTOFRONTAL_BICICLETA' => 'required|image|max:2048',
            'FOTOCOMPLETA_BICICLETA' => 'required|image|max:2048',
            'FOTONUMSERIE_BICICLETA'=> 'required|image|max:2048',
            'FOTOCOMP_BICICLETA'=> 'required|image|max:2048',
        ]);
        $imgFrontal = request()->file('FOTOFRONTAL_BICICLETA')
            ->store('public/'.$identificacion.'/'.request()->get('NUMEROSERIE_BICICLETA'));
        $imgCompleta = request()->file('FOTOCOMPLETA_BICICLETA')
            ->store('public/'.$identificacion.'/'.request()->get('NUMEROSERIE_BICICLETA'));
        $imgNumSerie = request()->file('FOTONUMSERIE_BICICLETA')
            ->store('public/'.$identificacion.'/'.request()->get('NUMEROSERIE_BICICLETA'));
        $imgComponentes = request()->file('FOTOCOMP_BICICLETA')
            ->store('public/'.$identificacion.'/'.request()->get('NUMEROSERIE_BICICLETA'));

        $urlImgFrontal = Storage::url($imgFrontal);
        $urlImgCompleta = Storage::url($imgCompleta);
        $urlImgNumSerie = Storage::url($imgNumSerie);
        $urlImgComponentes = Storage::url($imgComponentes);

        try {
            $bicicleta = Bicicleta::create([
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
            
            return response()->json($bicicleta, 201);
        } catch (\Exception $e) {
            //TODO: Solucionar problema de mismo numero de serie con misma identificacion de dueño elimina todo el direcotiro 
            // Storage::deleteDirectory('public/'.$identificacion.'/'.request()->get('NUMEROSERIE_BICICLETA'));
            Storage::delete($urlImgFrontal);
            Storage::delete($imgCompleta);
            Storage::delete($imgNumSerie);
            Storage::delete($imgComponentes);
            return response()->json($e, 400);
        }

    }
}
