<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        $usuarios = User::all();
        $nombrePersonalizado = 'usuarios';  // Puedes cambiar este nombre según tus preferencias
        $response = [
            $nombrePersonalizado => $usuarios
        ];
        
        return response()->json($response);
    }
    public function usuario(string $id)
    {
       
        $usuarios = User::where('id', '=', $id)->get();
        $nombrePersonalizado = 'usuario';  // Puedes cambiar este nombre según tus preferencias
        $response = [
            $nombrePersonalizado => $usuarios
        ];
        
        return response()->json($response);
    }
}
