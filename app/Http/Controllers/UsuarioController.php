<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index() {
        // $usuarios = Usuario::all();
        // // dd($usuarios);
        return view('usuario.index')->with([
            'usuarios' => Usuario::all(),
        ]);
    }

    public function create() {
        //TODO: crear post
    }
}
