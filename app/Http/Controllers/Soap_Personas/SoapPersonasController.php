<?php

namespace App\Http\Controllers\Soap_Personas;

use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Soap\BaseSoapController;

class SoapPersonasController extends BaseSoapController
{
    private $service;

    public function getFichaGeneral($cedula) {
        try {
            self::setWsdl(Config::get('app.urlwebservice_personas'));
            $this->service = InstanceSoapPersonasClient::init();

            $result = $this->service->getFichaGeneral([
                'codigoPaquete' => '1038',
                // 'numeroIdentificacion' => $cedula
                'numeroIdentificacion' => $cedula
            ]);
            // dd($result->return->instituciones->datosPrincipales->registros);
            $datosPersonas = $result->return->instituciones->datosPrincipales->registros;
            // dd($datosPersonas);

            if(!$datosPersonas) {
                return null;
            } else {
                return $datosPersonas;
            }

            // dd($personas['NewDataSet']['Table']);
            // if(!$personas) {
            //     return null;
            // } else {
            //     return $personas['NewDataSet']['Table'];
            // }

        } catch (\Exception $e) {
            return null;
        }
    }
}
