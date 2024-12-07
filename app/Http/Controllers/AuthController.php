<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Buscar el usuario por correo
        $user = User::where('email', $request->email)->first();

        // Verificar si el usuario existe, la contraseña es correcta y el estado es activo
        if (!$user || !Hash::check($request->password, $user->password) || $user->estado !== 'activo') {
            return response()->json([
                'success' => false,
                'message' => 'Credenciales incorrectas o usuario inactivo',
            ], 401);
        }

        // Si todo es válido, retornar una respuesta exitosa
        return response()->json([
            'success' => true,
            'message' => 'Inicio de sesión exitoso',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'idArea' => $user->idArea,
                'idPerfil' => $user->idPerfil,
                'NumeroEmpleado' => $user->NumeroEmpleado,
            ],
        ]);
    }
}
