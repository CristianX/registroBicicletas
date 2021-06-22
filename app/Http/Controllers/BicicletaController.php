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
        $nombreApoderado = request()->get('apoderado_bicicleta');
        if(! $nombreApoderado) {
            $usuario = Usuario::findOrFail($identificacion);
            $nombreApoderado = $usuario->NOMBRES_USUARIO.' '.$usuario->APELLIDOS_USUARIO;
        }

        request()->validate([
            'fotofrontal_bicicleta' => 'required|image|max:2048',
            'fotocompleta_bicicleta' => 'required|image|max:2048',
            'fotonumserie_bicicleta'=> 'required|image|max:2048',
            'fotocomp_bicicleta'=> 'required|image|max:2048',
        ]);
        $imgFrontal = request()->file('fotofrontal_bicicleta')
            ->store('public/'.$identificacion.'/'.$nombreApoderado.'/'.request()->get('numeroserie_bicicleta'));
        $imgCompleta = request()->file('fotocompleta_bicicleta')
            ->store('public/'.$identificacion.'/'.$nombreApoderado.'/'.request()->get('numeroserie_bicicleta'));
        $imgNumSerie = request()->file('fotonumserie_bicicleta')
            ->store('public/'.$identificacion.'/'.$nombreApoderado.'/'.request()->get('numeroserie_bicicleta'));
        $imgComponentes = request()->file('fotocomp_bicicleta')
            ->store('public/'.$identificacion.'/'.$nombreApoderado.'/'.request()->get('numeroserie_bicicleta'));

        $urlImgFrontal = Storage::url($imgFrontal);
        $urlImgCompleta = Storage::url($imgCompleta);
        $urlImgNumSerie = Storage::url($imgNumSerie);
        $urlImgComponentes = Storage::url($imgComponentes);

        try {
            Bicicleta::create([
                'numeroserie_bicicleta' => request()->numeroserie_bicicleta,
                'identificacion_usuario' => $identificacion,
                'marca_bicicleta' => request()->marca_bicicleta,
                'modelo_bicicleta' => request()->modelo_bicicleta,
                'categoria_bicicleta' => request()->categoria_bicicleta,
                'tipobicicleta_bicicleta' => request()->tipobicicleta_bicicleta,
                'tamanio_bicicleta' => request()->tamanio_bicicleta,
                'combcolores_bicicleta' => request()->combcolores_bicicleta,
                'espec_bicicleta' => request()->espec_bicicleta,
                'fotofrontal_bicicleta' => $urlImgFrontal,
                'fotocompleta_bicicleta' => $urlImgCompleta,
                'fotonumserie_bicicleta' => $urlImgNumSerie,
                'fotocomp_bicicleta' => $urlImgComponentes,
                'apoderado_bicicleta' => $nombreApoderado,
            ]);
            
            
        } catch (\Exception $e) {
            // Storage::deleteDirectory('public/'.$identificacion.'/'.request()->get('numeroserie_bicicleta')); 
            return $e;
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
            'fotofrontal_bicicleta' => 'required|image|max:2048',
            'fotocompleta_bicicleta' => 'required|image|max:2048',
            'fotonumserie_bicicleta'=> 'required|image|max:2048',
            'fotocomp_bicicleta'=> 'required|image|max:2048',
        ]);
        $imgFrontal = request()->file('fotofrontal_bicicleta')
            ->store('public/'.$identificacion.'/'.request()->get('numeroserie_bicicleta'));
        $imgCompleta = request()->file('fotocompleta_bicicleta')
            ->store('public/'.$identificacion.'/'.request()->get('numeroserie_bicicleta'));
        $imgNumSerie = request()->file('fotonumserie_bicicleta')
            ->store('public/'.$identificacion.'/'.request()->get('numeroserie_bicicleta'));
        $imgComponentes = request()->file('fotocomp_bicicleta')
            ->store('public/'.$identificacion.'/'.request()->get('numeroserie_bicicleta'));

        $urlImgFrontal = Storage::url($imgFrontal);
        $urlImgCompleta = Storage::url($imgCompleta);
        $urlImgNumSerie = Storage::url($imgNumSerie);
        $urlImgComponentes = Storage::url($imgComponentes);

        try {
            $bicicleta = Bicicleta::create([
                'numeroserie_bicicleta' => request()->numeroserie_bicicleta,
                'identificacion_usuario' => $identificacion,
                'marca_bicicleta' => request()->marca_bicicleta,
                'modelo_bicicleta' => request()->modelo_bicicleta,
                'categoria_bicicleta' => request()->categoria_bicicleta,
                'tipobicicleta_bicicleta' => request()->tipobicicleta_bicicleta,
                'tamanio_bicicleta' => request()->tamanio_bicicleta,
                'combcolores_bicicleta' => request()->combcolores_bicicleta,
                'espec_bicicleta' => request()->espec_bicicleta,
                'fotofrontal_bicicleta' => $urlImgFrontal,
                'fotocompleta_bicicleta' => $urlImgCompleta,
                'fotonumserie_bicicleta' => $urlImgNumSerie,
                'fotocomp_bicicleta' => $urlImgComponentes,
            ]);
            
            return response()->json($bicicleta, 201);
        } catch (\Exception $e) {
            //TODO: Solucionar problema de mismo numero de serie con misma identificacion de dueño elimina todo el direcotiro 
            // Storage::deleteDirectory('public/'.$identificacion.'/'.request()->get('numeroserie_bicicleta'));
            Storage::delete($urlImgFrontal);
            Storage::delete($imgCompleta);
            Storage::delete($imgNumSerie);
            Storage::delete($imgComponentes);
            return response()->json($e, 400);
        }

    }
}
