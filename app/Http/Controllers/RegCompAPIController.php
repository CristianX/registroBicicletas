<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bicicleta;
use Illuminate\Support\Facades\Mail;

class RegCompAPIController extends Controller
{
    public function index($bicicleta) {

        try {
            // dd(phpinfo());
            $bicicleta = Bicicleta::findOrFail($bicicleta);
            Mail::to('thecristianx@hotmail.com')->send(new \App\Mail\CorreoVerificacion($bicicleta));
            return response()->json($bicicleta, 201);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }

        
    }
}
