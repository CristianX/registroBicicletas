<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bicicleta;

class RegCompController extends Controller
{
    public function index($bicicleta) {
        $bicicleta = Bicicleta::findOrFail($bicicleta);
        return view('registroCompletado.index')->with([
            'bicicleta' => $bicicleta,
        ]);
    }
}
