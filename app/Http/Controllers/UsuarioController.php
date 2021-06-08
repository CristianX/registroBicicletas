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

        // $rules = [
        //     'IDENTIFICACION_USUARIO' => ['required', 'max:10'],
        //     'NOMBRES_USUARIO' => ['required', 'max:200'],
        //     'APELLIDOS_USUARIO' => ['required', 'max:200'],
        //     'EDAD_USUARIO' => ['required'],
        //     'EMAIL_USUARIO' => ['required', 'max:400'],
        //     'TELFCONVENCIONAL_USUARIO' => ['required', 'max:10'],
        //     'TELFCELULAR_USUARIO' => ['required', 'max:10'],
        //     'NACIONALIDAD_USUARIO' => ['required', 'max:200'],
        //     'PARROQUIARES_USUARIO' => ['required', 'max:600'],
        //     'BARRIORES_USUARIO' => ['required', 'max:600'],
        // ];
        // request()->validate($rules);

        try {
            Usuario::create(request()->all());
            $identificacion = request()->get('IDENTIFICACION_USUARIO');
        } catch (\Exception $e) {
            return back()->withError("Usuario Registrado Anteriormente")->withInput();
        }
        
        return redirect()->route('bicicleta.index', [$identificacion]);
        
    }
}
