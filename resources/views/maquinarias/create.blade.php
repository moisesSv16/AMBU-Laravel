<x-app-layout>
</x-app-layout>
@extends('layouts.plantillabase')

@section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
 @endsection

@section('contenido')

<h2  class="text-white text-center">Registro de Maquinaria o Herramienta</h2>

<form action="/maquinarias" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="" class="form-labe text-white">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control" placeholder ='Ingrese el nombre de la maquinaria' required tabindex="1">
    </div>
    <div>
        <label for="" class="form-label text-white">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder ='Ingrese la descripción' required tabindex="2">
    </div>
    <div>
        <label for="" class="form-label text-white">Ubicación</label>
        <select name="ubicacion" class="form-control">
        @foreach($ubicaciones as $ubicacion)
        <option value="{{ $ubicacion->calle}}, {{$ubicacion->numero}}">{{ $ubicacion->calle}}, {{$ubicacion->numero}}</option>
          @endforeach
        </select>
    
    </div>
    <div>
        <label for="" class="form-label text-white">Imagen</label>
        <input type="file" id="imagen" name="imagen" class="form-control" required tabindex="9">
    </div>
   <div>
        <label for="" class="form-label text-white">Precio</label>
        <input type="number" id="costo" name="costo" class="form-control" placeholder ='Ingrese el precio del alquiler por dia' required tabindex="5">
    </div> 
    <div>
    <input type="hidden" id="id_usuario" name="id_usuario" class="form-control"  value="{{ Auth::user()->id }}">
    </div>
    <br>
   
    
    <br>
    <a href="/maquinarias" class="btn btn-secondary" tabindex="10">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="11">Guardar</button>
</form>
@endsection 

