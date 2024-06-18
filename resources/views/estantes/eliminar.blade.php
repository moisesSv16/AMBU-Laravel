<x-app-layout>
</x-app-layout>
@extends('layouts.plantillabase')

@section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
 @endsection

@section('contenido')

<h2 class="text-white text-center">Eliminar Registro de Estantes</h2>

<form action="{{ route('eliminar_lugares') }}" method="POST" >
    @csrf
    <div>
        <label for="" class="form-label text-white">Letra</label>
        <input type="text" id="letra" name="letra" class="form-control" tabindex="1">
    </div>
    <div>
        <label for="" class="form-label text-white">Rango de inicio</label>
        <input type="number" id="rango_inicio" name="rango_inicio" class="form-control" tabindex="2">
    </div>
    <div>
        <label for="" class="form-label text-white">Rango de fin</label>
        <input type="number" id="rango_fin" name="rango_fin" class="form-control" tabindex="3">
    </div>
    
    <br>
    <a href="/estantes" class="btn btn-secondary" tabindex="10">Cancelar</a>
    <button type="submit" class="btn btn-danger" tabindex="11">Eliminar</button>
</form>
@endsection 

