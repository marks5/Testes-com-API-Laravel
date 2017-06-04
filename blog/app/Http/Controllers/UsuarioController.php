<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsuarioController extends Controller
{
    public function getUsuarios()
    {
        return \App\Usuario::all();
    }

    public function postUsuario(Request $request){
        $usuario = new \App\Usuario();
        $usuario->nome = $request->nome;
        if(!empty($usuario->nome)){
            $usuario->save();
            return response()->json(['Status' => 'Ok']);
        } else {
            return response()->json(['Status' => 'Erro ao salvar']);
        }
    }
}