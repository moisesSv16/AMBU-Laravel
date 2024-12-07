<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficaController extends Controller
{
    public function getIncidencias(Request $request)
    {
        // Obtener el tipo de incidencia desde la solicitud (parámetro GET)
        $tipoIncidencia = $request->input('tipo');

        if (!$tipoIncidencia) {
            return response()->json(['error' => 'Tipo de incidencia no especificado'], 400);
        }

        // Consulta para contar las incidencias por estado
        $result = DB::table($tipoIncidencia)
            ->select('estado', DB::raw('COUNT(*) as cantidad'))
            ->where('estado', '!=', 'Resuelto')
            ->groupBy('estado')
            ->get();

        // Consulta para obtener todos los ID de la tabla
        $ids = DB::table($tipoIncidencia)
            ->select('id')
            ->pluck('id'); // Devuelve un array de IDs

        // Consulta para obtener los registros con nombres de municipio y parque
        $detallesIncidencias = DB::table($tipoIncidencia)
            ->join('municipios', "$tipoIncidencia.id_municipio", '=', 'municipios.id')
            ->join('parques', "$tipoIncidencia.id_parque", '=', 'parques.id')
            ->select(
                "$tipoIncidencia.id",
                "$tipoIncidencia.folio",
                "$tipoIncidencia.estado",
                'municipios.NombreMunicipio as municipio',
                'parques.NombreParque as parque'
            )
            ->where("$tipoIncidencia.estado", '!=', 'Resuelto')
            ->get();

        // Calcular el total de incidencias
        $totalIncidencias = $result->sum('cantidad');

        // Devolver los datos en formato JSON
        return response()->json([
            'total' => $totalIncidencias,
            'estados' => $result,
            'ids' => $ids,
            'detalles' => $detallesIncidencias
        ]);
    }
}
