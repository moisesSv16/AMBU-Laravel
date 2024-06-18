<x-app-layout>
</x-app-layout>
@extends('layouts.plantillabase');

@section('contenido')
<h2 class="text-white text-center">Editar registro de la Herramienta: {{$maquinarias->nombre}}</h2>

<form action="/maquinarias/{{$maquinarias->id}}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('¿Estás seguro que desea modificar el registro?')">
    @csrf
    @method('PUT')
    <div>
    <a href="/maquinarias" class="btn btn-secondary" tabindex="4">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
    <br>
    </div>
    <div>
        <label for="" class="form-label text-white">Nombre</label>
        <input type="text" value="{{$maquinarias->nombre}}" id="nombre" name="nombre" class="form-control" required tabindex="1">
    </div>
    <div>
        <label for="" class="form-label text-white">Descripción</label>
        <input type="text" value="{{$maquinarias->descripcion}}" id="descripcion" name="descripcion" class="form-control" required tabindex="2">
    </div>
    <div>
        <label for="" class="form-label text-white">Ubicación</label>
        <select name="ubicacion" class="form-control">
        <option value="{{$maquinarias->ubicacion}}">{{$maquinarias->ubicacion}}</option>
        @foreach($ubicaciones as $ubicacion)
        <option value="{{ $ubicacion->calle}}, {{$ubicacion->numero}}">{{ $ubicacion->calle}}, {{$ubicacion->numero}}</option>
          @endforeach
        </select>
    </div>
    <div>
        <label for="" class="form-label text-white">Precio</label>
        <input type="number" value="{{$maquinarias->costo}}" id="costo" name="costo" class="form-control" required tabindex="3">
    </div>
    <div>
        <label for="" class="form-label text-white">Imagen</label>
        <input type="file" value="{{$maquinarias->imagen}}" id="imagen" name="imagen" class="form-control col-6" required tabindex="3">
        <br>
        <img src="{{asset($maquinarias->imagen)}}" alt="100px" class="img-fluid col-2" whidth="120px">
    </div>
    <br>
    
    
</form>
@endsection 
