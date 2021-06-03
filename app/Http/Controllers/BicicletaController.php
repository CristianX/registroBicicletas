<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BicicletaController extends Controller
{
    public function index() {
        return view('bicicleta.index');
    }
}
