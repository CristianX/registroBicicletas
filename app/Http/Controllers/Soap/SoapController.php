<?php

namespace App\Http\Controllers\Soap;

use Illuminate\Support\Facades\Config;

class SoapController extends BaseSoapController
{
    private $service;

    public function datosRucEstablecimiento($ruc) {
        try {
            self::setWsdl(Config::get('app.urlwebservice'));
            $this->service = InstanceSoapClient::init();

            $persons = $this->service->InformacionEstablecimiento(['ruc' => $ruc ]);
            $personas = $this->loadXmlStringAsArray($persons->InformacionEstablecimientoResult->any);
            // dd($personas['NewDataSet']['Table']);
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
