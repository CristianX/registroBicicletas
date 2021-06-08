<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function pasarRegBIcicletas() {
        $identificacion = request()->get('identificacion');
        // return $identificacion;
        return redirect()->route('bicicleta.index', [$identificacion]);
    }
}

