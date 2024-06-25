<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro_incidencias;
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

    public function guardar(Request $request)
    {
        /*$guardar = new Registro_incidencias();
        $guardar->idUsuario = $request->input('idUsuario');
        $guardar->idPuntoRecorrido = $request->input('idPuntoRecorrido');
        $guardar->idTipo = $request->input('idTipo');
        $guardar->idSolicitud = $request->input('idSolicitud');
        $guardar->Descripcion = $request->input('Descripcion');
        $guardar->Imagen = $request->input('Imagen');
        $guardar->Estado = $request->input('Estado');
        
        */
        $guardar = new Registro();
        $guardar->Parque = $request->input('Parque');
        $guardar->Municipio = $request->input('Municipio');
        $guardar->Nombre = $request->input('Nombre');
        $guardar->Tipo = $request->input('Tipo');
        $guardar->Descripcion = $request->input('Descripcion');
        $guardar->Imagen = $request->input('Imagen');
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
