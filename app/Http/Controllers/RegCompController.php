<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegCompController extends Controller
{
    public function index($identificacion) {
        return view('registroCompletado.index')->with([
            'identificacion' => $identificacion,
        ]);
    }
}
