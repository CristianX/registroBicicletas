<?php

namespace App\Http\Controllers;

use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index() {
        // $usuarios = Usuario::all();
        // // dd($usuarios);
        return view('usuario.mostrarUsuarios')->with([
            'usuarios' => Usuario::all(),
        ]);
    }

    public function create() {

        return view('usuario.index');
    }

    public function store() {

        try {
            Usuario::create(request()->all());
            //TODO: Checar la línea 27
            $identificacion = request()->get('IDENTIFICACION_USUARIO');
        } catch (\Exception $e) {
            return back()->withError("Usuario Registrado Anteriormente")->withInput();
        }
        
        return redirect()->route('bicicleta.index', [$identificacion]);
        
    } 

    // Backend de Api

    public function storeApi() {
        try {
            $usuario = Usuario::create(request()->all());
            return response()->json($usuario, 201);
        } catch (\Exception $e) {
            return response()->json($e, 400);
        }
    }
}
