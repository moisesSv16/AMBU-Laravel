<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro_incidencias;
use Illuminate\Support\Facades\Log;
use App\Models\Registro;


class IncidenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    public function mostrar()
    {
        $mostrar=Registro_incidencias::all();

        $nombrePersonalizado = 'incidencias';  // Puedes cambiar este nombre según tus preferencias
        $response = [
            $nombrePersonalizado => $mostrar
        ];
        return response()->json($response);
    }

    public function movil()
    {
        $mostrar=Registro::all();

        $nombrePersonalizado = 'incidencias';  // Puedes cambiar este nombre según tus preferencias
        $response = [
            $nombrePersonalizado => $mostrar
        ];
        return response()->json($response);
    }
    public function movilid(string $id)
    {
        $registro=Registro::where('id', '=', $id)->get();
        
        
        return response()->json($registro);
    }

    public function guardar(Request $request)
{
    //\Log::info('Contenido del cuerpo de la solicitud:', [$request->getContent()]);

    // Extraer el contenido del cuerpo de la solicitud
    $cuerpo = $request->getContent();

    // Intentar corregir la codificación UTF-8 si es necesario
    $cuerpo = mb_convert_encoding($cuerpo, 'UTF-8', 'UTF-8');

    // Decodificar el JSON
    $datos = json_decode($cuerpo, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        \Log::error('Error al decodificar JSON:', ['error' => json_last_error_msg()]);
        return response()->json(['message' => 'Formato de JSON invalido'.$cuerpo ], 400);
    }

    \Log::info('Datos decodificados:', $datos);

    // Validar los datos decodificados
    if (!isset($datos['Parque'], $datos['Municipio'], $datos['Nombre'], $datos['Tipo'], $datos['Tipo_incidencia'], $datos['Descripcion'])) {
        return response()->json(['message' => 'Faltan datos requeridos'], 400);
    }

    $guardar = new Registro();

    // Manejar la imagen base64
    if (isset($datos['Imagen'])) {
        $base64Image = $datos['Imagen'];
        $image = base64_decode($base64Image);

        if ($image === false) {
            return response()->json(['message' => 'Imagen base64 inválida'], 400);
        }

        // Crear un nombre único para la imagen
        $imgnombre = time() . '.png';

        // Ruta donde se guardará la imagen
        $url = 'imagenes/';
        $path = public_path($url . $imgnombre);

        // Guardar la imagen decodificada en el servidor
        file_put_contents($path, $image);

        // Asignar la ruta de la imagen al modelo
        $guardar->Imagen = $url . $imgnombre;
    }else{
        $guardar->Imagen = 'SIN IMAGEN';
    }

    $guardar->Parque = $datos['Parque'];
    //\Log::info('Parque:', ['Parque' => $guardar->Parque]);

    $guardar->Municipio = $datos['Municipio'];
    $guardar->Nombre = $datos['Nombre'];
    $guardar->Tipo = $datos['Tipo'];
    $guardar->Tipo_incidencia = $datos['Tipo_incidencia'];
    $guardar->Descripcion = $datos['Descripcion'];
    $guardar->Estado = "Activo";
    $guardar->save();

    // Devolver la respuesta JSON con la parte actualizada
    return response()->json(['message' => 'Guardado exitoso'], 200);
}

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
