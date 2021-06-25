<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Soap\SoapController;
use App\Models\Bicicleta;
use App\Models\Usuario;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

class BicicletaController extends Controller
{


    public function index() {
        return view('bicicleta.mostrarBicicletas')->with([
            'bicicletas' => Bicicleta::all(),
        ]);
    }

    public function create($identificacion) {
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

        $razonSocial = null;

        $ruc = request()->get('RAZONSOCIAL_BICICLETA');

        // Datos ruc del web service
        $soapController = new SoapController();
        // return $datosEstablecimiento['NUMERO_RUC'];
        if($ruc != null) {
            $datosEstablecimiento = $soapController->datosRucEstablecimiento($ruc);
            if(!$datosEstablecimiento) {
                return back()->withError("No Existe un establecimiento con el ruc indicado")->withInput();;
            } else {
                $razonSocial = $datosEstablecimiento['RAZON_SOCIAL'];
            }
        }


        $nombreApoderado = request()->get('APODERADO_BICICLETA');
        if(! $nombreApoderado) {
            $usuario = Usuario::findOrFail($identificacion);
            $nombreApoderado = $usuario->NOMBRES_USUARIO.' '.$usuario->APELLIDOS_USUARIO;
        }

        request()->validate([
            'FOTOFRONTAL_BICICLETA' => 'required|image|max:2048',
            'FOTOCOMPLETA_BICICLETA' => 'required|image|max:2048',
            'FOTONUMSERIE_BICICLETA'=> 'required|image|max:2048',
            'FOTOCOMP_BICICLETA'=> 'required|image|max:2048',
            'FOTOFACTURA_BICICLETA' => 'image|max:2048'
        ]);

        $imgFotoFactura = request()->file('FOTOFACTURA_BICICLETA');
        if( $imgFotoFactura != null ) {
            $imgFotoFactura = request()->file('FOTOFRONTAL_BICICLETA')
            ->store('public/'.$identificacion.'/'.$nombreApoderado.'/'.request()->get('NUMEROSERIE_BICICLETA').'/'.'Factura');
            $urlImgFotoFactura = Storage::url($imgFotoFactura);
        } else {
            $urlImgFotoFactura = null;
        }

        $imgFrontal = request()->file('FOTOFRONTAL_BICICLETA')
            ->store('public/'.$identificacion.'/'.$nombreApoderado.'/'.request()->get('NUMEROSERIE_BICICLETA'));
        $imgCompleta = request()->file('FOTOCOMPLETA_BICICLETA')
            ->store('public/'.$identificacion.'/'.$nombreApoderado.'/'.request()->get('NUMEROSERIE_BICICLETA'));
        $imgNumSerie = request()->file('FOTONUMSERIE_BICICLETA')
            ->store('public/'.$identificacion.'/'.$nombreApoderado.'/'.request()->get('NUMEROSERIE_BICICLETA'));
        $imgComponentes = request()->file('FOTOCOMP_BICICLETA')
            ->store('public/'.$identificacion.'/'.$nombreApoderado.'/'.request()->get('NUMEROSERIE_BICICLETA'));

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
                'APODERADO_BICICLETA' => $nombreApoderado,
                'RAZONSOCIAL_BICICLETA' => $razonSocial,
                'FOTOFACTURA_BICICLETA' => $urlImgFotoFactura,
                'DESCUSADA_BICICLETA' => request()->DESCUSADA_BICICLETA,
                'NOMBUSADA_BICICLETA' => request()->NOMBUSADA_BICICLETA,
                
            ]);
            
            
        } catch (\Exception $e) {
            // Storage::deleteDirectory('public/'.$identificacion.'/'.request()->get('NUMEROSERIE_BICICLETA')); 
            Storage::delete($urlImgFotoFactura);
            Storage::delete($urlImgFrontal);
            Storage::delete($imgCompleta);
            Storage::delete($imgNumSerie);
            Storage::delete($imgComponentes);
            return back()->withError("Bicicleta registrada anteriormente")->withInput();
        }

        return redirect()->route('registro.index', ['identificacion' => $identificacion]);

        
    }

    public function show($identificacion) {
        try {
            return view('bicicleta.bicicletaPorId')->with([
                'bicicletas' => Bicicleta::where('IDENTIFICACION_USUARIO', $identificacion)->get(),
                'identificacion' => Usuario::findOrFail($identificacion),
                // Problema de borrado de 0 a la izquierda
                'regIdentificacion' => $identificacion,
            ]);
        } catch (\Exception $e) {
            return redirect()->route('usuario.index');
        }
    }

    public function edit($bicicleta) {
        // TODO: añadir try catch

        $bicicletaProv = Bicicleta::findOrFail($bicicleta);
        return view('bicicleta.edit')->with([
            'bicicleta' => Bicicleta::findOrFail($bicicleta),
            'usuario' => Usuario::findOrFail($bicicletaProv->IDENTIFICACION_USUARIO),
        ]);
    }

    public function update($bicicleta) {

        $bicicletaProv = Bicicleta::findOrFail($bicicleta);

        $nombreApoderado = request()->get('APODERADO_BICICLETA');
        if(! $nombreApoderado) {
            $usuario = Usuario::findOrFail($bicicletaProv->IDENTIFICACION_USUARIO);
            $nombreApoderado = $usuario->NOMBRES_USUARIO.' '.$usuario->APELLIDOS_USUARIO;
        }

        $bicicleta = Bicicleta::findOrFail($bicicleta);
        $bicicleta->update([
                'NUMEROSERIE_BICICLETA' => request()->NUMEROSERIE_BICICLETA,
                'MARCA_BICICLETA' => request()->MARCA_BICICLETA,
                'MODELO_BICICLETA' => request()->MODELO_BICICLETA,
                'CATEGORIA_BICICLETA' => request()->CATEGORIA_BICICLETA,
                'TIPOBICICLETA_BICICLETA' => request()->TIPOBICICLETA_BICICLETA,
                'TAMANIO_BICICLETA' => request()->TAMANIO_BICICLETA,
                'COMBCOLORES_BICICLETA' => request()->COMBCOLORES_BICICLETA,
                'ESPEC_BICICLETA' => request()->ESPEC_BICICLETA,
                'APODERADO_BICICLETA' => $nombreApoderado,
        ]);
        return redirect()->route('bicicleta.mostrarBicicletasPorId', [$bicicleta->IDENTIFICACION_USUARIO]);
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
