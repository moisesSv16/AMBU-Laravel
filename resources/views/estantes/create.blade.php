<x-app-layout>
</x-app-layout>
@extends('layouts.plantillabase')

@section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
 @endsection

@section('contenido')

<h2 class="text-white text-center">Registro de estantes</h2>

<form action="/estantes" method="POST" >
    @csrf
    <div>
        <label for="" class="form-label text-white">Letra</label>
        <input type="text" name="letra" required class="form-control" tabindex="1">
    </div>
    <div>
        <label for="" class="form-label text-white">Lugares</label>
        <input type="number" name="lugares" class="form-control" tabindex="2">
    </div>
    
    <br>
    <a href="/estantes" class="btn btn-secondary" tabindex="10">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="11">Guardar</button>
</form>
@endsection 

