<x-app-layout>
</x-app-layout>
@extends('layouts.plantillabase');

@section('contenido')
<h2 class="text-white text-center">Editar registro del Producto: {{$partes->nombre}}, {{$partes->codigo}}</h2>

<form action="/partes/{{$partes->id}}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('¿Estás seguro que desea modificar el producto?')">
    @csrf
    @method('PUT')
    <div>
    <a href="/partes" class="btn btn-secondary" tabindex="4">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
    <br>
    </div>
    <div>
        <label for="" class="form-label text-white">Nombre</label>
        <input type="text" value="{{$partes->nombre}}" id="nombre" name="nombre" class="form-control" tabindex="1">
    </div>
    <div>
        <label for="" class="form-label text-white">Descripción</label>
        <input type="text" value="{{$partes->descripcion}}" id="descripcion" name="descripcion" class="form-control" tabindex="2">
    </div>
    <div>
        <label for="" class="form-label text-white">Codigo</label>
        <input type="text" value="{{$partes->codigo}}" id="codigo" name="codigo" class="form-control" tabindex="3">
    </div>
    <div>
        <label for="" class="form-label text-white">Folio</label>
        <input type="text" value="{{$partes->folio}}" id="folio" name="folio" class="form-control" tabindex="3">
    </div>
    <div>
        <label for="" class="form-label text-white">Existencias</label>
        <input type="text" value="{{$partes->existencias}}" id="existencias" name="existencias" class="form-control" tabindex="3">
    </div>
    <div>
        <label for="" class="form-label text-white">Categoria</label>
        <input type="text" value="{{$partes->categoria}}" id="categoria" name="categoria" class="form-control" tabindex="3">
    </div>
    <div>
        <label for="" class="form-label text-white">Precio</label>
        <input type="text" value="{{$partes->precio}}" id="precio" name="precio" class="form-control" tabindex="3">
    </div>
    <div>
        <label for="" class="form-label text-white">Zona</label>
        <input type="text" value="{{$partes->zona}}" id="zona" name="zona" class="form-control" tabindex="3" readonly>
    </div>
    <div>
        <label for="" class="form-label text-white">Imagen</label>
        <input type="file" value="{{$partes->imagen}}" id="imagen" name="imagen" class="form-control col-6" tabindex="3">
        <br>
        <img src="{{asset($partes->imagen)}}" alt="100px" class="img-fluid col-2" whidth="120px">
    </div>
    <br>
    
    
</form>
@endsection 
