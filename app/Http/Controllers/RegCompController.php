<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegCompController extends Controller
{
    public function index() {
        return view('registroCompletado.index');
    }
}
