<?php

namespace App\Http\Controllers\Soap;


class SoapController extends BaseSoapController
{
    private $service;

    public function datosRucEstablecimiento($ruc) {
        try {
            self::setWsdl('http://172.20.47.219/MDMQ_CrecimientoTributario_WS/WS_SRI_PER.asmx?WSDL');
            $this->service = InstanceSoapClient::init();

            $persons = $this->service->InformacionContribuyente(['ruc' => $ruc ]);
            $personas = $this->loadXmlStringAsArray($persons->InformacionContribuyenteResult->any);
            // dd($personas);
            if(!$personas) {
                return null;
            } else {
                return $personas['NewDataSet']['Table'];
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
