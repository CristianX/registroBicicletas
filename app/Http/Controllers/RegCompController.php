<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bicicleta;
use Illuminate\Support\Facades\Mail;

class RegCompController extends Controller
{
    public function index($bicicleta) {

        try {
            // dd(phpinfo());
            $bicicleta = Bicicleta::findOrFail($bicicleta);
            Mail::to('thecristianx@hotmail.com')->send(new \App\Mail\CorreoVerificacion($bicicleta));
            return view('registroCompletado.index')->with([
                'bicicleta' => $bicicleta,
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        
    }
}
