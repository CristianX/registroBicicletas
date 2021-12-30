<?php

namespace App\Http\Controllers\Soap_Personas;
use SoapClient;
use App\Http\Controllers\Soap\BaseSoapController;

class InstanceSoapPersonasClient extends BaseSoapController implements InterfaceInstanceSoapPersonas
{
    public static function init() {
        $wsdlUrl = self::getWsdl();
        $soapClientOptions = [
            'stream_context' => self::generateContext(),
            'cache_wsdl'     => WSDL_CACHE_NONE,
            'login' => 'InDrOmQdTa',
            'password' => '2QK@71PSp/eDcH',



            
        ];
        return new SoapClient($wsdlUrl, $soapClientOptions);
    }
}