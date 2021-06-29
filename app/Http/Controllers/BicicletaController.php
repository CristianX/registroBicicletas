<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Soap\SoapController;
use App\Models\Bicicleta;
use App\Models\Usuario;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;


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
                return back()->withError(Config::get('errormessages.ERROR_RUC'))->withInput();;
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
            'FOTONUMSERIE_BICICLETA'=> 'image|max:2048',
            'FOTOCOMP_BICICLETA'=> 'image|max:2048',
            'FOTOFACTURA_BICICLETA' => 'image|max:2048',
            'FOTODENUNCIA_BICICLETA' => 'mimes:jpeg,bmp,png,gif,svg,pdf|max:2048',
        ]);

        $imgFotoFactura = request()->file('FOTOFACTURA_BICICLETA');
        if( $imgFotoFactura != null ) {
            $imgFotoFactura = request()->file('FOTOFRONTAL_BICICLETA')
            ->store('public/'.$identificacion.'/'.$nombreApoderado.'/'.request()->get('NUMEROSERIE_BICICLETA').'/'.'Factura');
            $urlImgFotoFactura = Storage::url($imgFotoFactura);
        } else {
            $urlImgFotoFactura = null;
        }

        $imgFotoDenuncia = request()->file('FOTODENUNCIA_BICICLETA');
        if ($imgFotoDenuncia != null) {
            $imgFotoDenuncia = request()->file('FOTODENUNCIA_BICICLETA')
            ->store('public/'.$identificacion.'/'.$nombreApoderado.'/'.request()->get('NUMEROSERIE_BICICLETA').'/'.'Denuncia');
            $urlImgFotoDenuncia = Storage::url($imgFotoDenuncia);
        } else {
            $urlImgFotoDenuncia = null;
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

        // Valor checkbox
        $valorCheckBox = (request()->get('ACTIVAROBADA_BICICLETA') == 'on' ? 1 : 0 );
        

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
                'ACTIVAROBADA_BICICLETA' => $valorCheckBox,
                'FOTODENUNCIA_BICICLETA' => $urlImgFotoDenuncia,
                'CODREGISTRO_BICICLETA' => substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10),
                
            ]);
            
            
        } catch (\Exception $e) {
            // Storage::deleteDirectory('public/'.$identificacion.'/'.request()->get('NUMEROSERIE_BICICLETA')); 
            Storage::delete($urlImgFotoFactura);
            Storage::delete($urlImgFotoDenuncia);
            Storage::delete($urlImgFrontal);
            Storage::delete($imgCompleta);
            Storage::delete($imgNumSerie);
            Storage::delete($imgComponentes);
            return back()->withError(Config::get('errormessages.POSTERROR_BICICLETA'))->withInput();
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

        $bicicleta = Bicicleta::findOrFail($bicicleta);

        request()->validate([
            'FOTODENUNCIA_BICICLETA' => 'mimes:jpeg,bmp,png,gif,svg,pdf|max:2048',
        ]);

        $nombreApoderado = request()->get('APODERADO_BICICLETA');
        if(! $nombreApoderado) {
            $usuario = Usuario::findOrFail($bicicleta->IDENTIFICACION_USUARIO);
            $nombreApoderado = $usuario->NOMBRES_USUARIO.' '.$usuario->APELLIDOS_USUARIO;
        }

        $imgFotoDenuncia = request()->file('FOTODENUNCIA_BICICLETA');
        if ($imgFotoDenuncia != null) {
            $imgFotoDenuncia = request()->file('FOTODENUNCIA_BICICLETA')
            ->store('public/'.$bicicleta->IDENTIFICACION_USUARIO .'/'.$nombreApoderado.'/'.request()->get('NUMEROSERIE_BICICLETA').'/'.'Denuncia');
            $urlImgFotoDenuncia = Storage::url($imgFotoDenuncia);
        } else {
            $urlImgFotoDenuncia = null;
        }
        
        if( $bicicleta->FOTODENUNCIA_BICICLETA != null && !$urlImgFotoDenuncia ) {
            $urlElimiar = str_replace('storage', 'public', $bicicleta->FOTODENUNCIA_BICICLETA);
            Storage::delete($urlElimiar);
        }

        // Valor checkbox
        $valorCheckBox = (request()->get('ACTIVAROBADA_BICICLETA') == 'on' ? 1 : 0 );
        if($bicicleta->FOTODENUNCIA_BICICLETA != null && $valorCheckBox != 0) {
            $urlImgFotoDenuncia = $bicicleta->FOTODENUNCIA_BICICLETA;
        }

        try {
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
                'ACTIVAROBADA_BICICLETA' => $valorCheckBox,
                'FOTODENUNCIA_BICICLETA' => $urlImgFotoDenuncia,
            ]);
        } catch (\Exception $e) {
            Storage::delete($urlImgFotoDenuncia);
            return back()->withError(Config::get('errormessages.PUTERROR_BICICLETA'))->withInput();
        }

        
        return redirect()->route('bicicleta.mostrarBicicletasPorId', [$bicicleta->IDENTIFICACION_USUARIO]);
    }

    public function mostrarPorCodigo($codRegistro) {
        $bicicleta = Bicicleta::where('CODREGISTRO_BICICLETA', $codRegistro)->firstOrFail();
        $usuario = Usuario::findOrFail($bicicleta->IDENTIFICACION_USUARIO);
        return view('bicicleta.consulta')->with([
            'bicicleta' => $bicicleta,
            'usuario' => $usuario,
        ]);
    }
}
