<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() {
        return view('welcome');
    }

    // public function pasarRegBIcicletas(Request $request) {
    //     $identificacion = $request->get('identificacion');
    //     return redirect()->route('bicicleta.index', [$identificacion]);
    // }
}

