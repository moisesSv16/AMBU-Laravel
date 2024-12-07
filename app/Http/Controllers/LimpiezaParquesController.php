<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class LimpiezaParquesController extends Controller
{
    public function obtenerIncidenciasLimpiezaParquesConRelaciones()
    {
        $incidencias = DB::table('incidencia_limpieza_parques')
            ->join('municipios', 'incidencia_limpieza_parques.id_municipio', '=', 'municipios.id')
            ->join('parques', 'incidencia_limpieza_parques.id_parque', '=', 'parques.id')
            ->join('users', 'incidencia_limpieza_parques.id_user', '=', 'users.id')
            ->select(
                'incidencia_limpieza_parques.*',
                'municipios.NombreMunicipio',
                'parques.NombreParque',
                'users.name'
            )
            ->get();

        return response()->json(['incidencias' => $incidencias]);
    }

    public function obtenerIncidenciaLimpiezaParquesPorId($id)
    {
        DB::enableQueryLog();
        Log::info("ID recibido: " . $id);

        $incidencia = DB::table('incidencia_limpieza_parques')
            ->leftJoin('municipios', 'incidencia_limpieza_parques.id_municipio', '=', 'municipios.id')
            ->leftJoin('parques', 'incidencia_limpieza_parques.id_parque', '=', 'parques.id')
            ->leftJoin('users', 'incidencia_limpieza_parques.id_user', '=', 'users.id')
            ->leftJoin('areas', 'users.idArea', '=', 'areas.id')
            ->leftJoin('perfiles', 'users.idPerfil', '=', 'perfiles.id')
            ->select(
                'incidencia_limpieza_parques.*',
                'municipios.NombreMunicipio',
                'parques.NombreParque',
                'users.name as NombreUsuario',
                'users.email as EmailUsuario',
                'users.Apellidos as ApellidosUsuario',
                'users.NumeroEmpleado',
                'areas.NombreArea',
                'perfiles.NombrePerfil'
            )
            ->where('incidencia_limpieza_parques.id', $id)
            ->first();


        Log::info(DB::getQueryLog());

        if ($incidencia) {
            return response()->json($incidencia);
        } else {
            return response()->json(['error' => 'Incidencia no encontrada'], 404);
        }
    }
}
