<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bicicleta;
use App\Models\Usuario;
use Illuminate\Support\Facades\Mail;

class RegCompController extends Controller
{
    public function index($bicicleta) {

        try {
            // dd(phpinfo());
            $bicicleta = Bicicleta::findOrFail($bicicleta);
            $usuario = Usuario::findOrFail($bicicleta->IDENTIFICACION_USUARIO);
            Mail::to($usuario->EMAIL_USUARIO)->send(new \App\Mail\CorreoVerificacion($bicicleta));
            return view('registroCompletado.index')->with([
                'bicicleta' => $bicicleta,
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        
    }
}
