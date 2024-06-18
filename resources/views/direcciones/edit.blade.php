<x-app-layout>
</x-app-layout>
@extends('layouts.plantillabase');

@section('contenido')
<h2 class="text-white text-center">Editar la dirección: {{$direcciones->calle}}</h2>

<form action="/direcciones/{{$direcciones->id}}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('¿Estás seguro que desea modificar la Dirección?')">
    @csrf
    @method('PUT')
    <div>
    <a href="/direcciones" class="btn btn-secondary" tabindex="4">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
    <br>
    </div>
    <div>
        <label for="" class="form-label text-white">Calle</label>
        <input type="text" value="{{$direcciones->calle}}" id="calle" name="calle" class="form-control" required tabindex="1">
    </div>
    <div>
        <label for="" class="form-label text-white">Numero</label>
        <input type="text" value="{{$direcciones->numero}}" id="numero" name="numero" class="form-control" required tabindex="2">
    </div>
    <div>
        <label for="" class="form-label text-white">Codigo Postal</label>
        <input type="text" value="{{$direcciones->codigo_postal}}" id="codigo_postal" name="codigo_postal" class="form-control" required tabindex="3">
    </div>
    <div>
        <label for="" class="form-label text-white">Ciudad</label>
        <input type="text" value="{{$direcciones->ciudad}}" id="ciudad" name="ciudad" class="form-control" required tabindex="3">
    </div>
   
    <br>
    
    
</form>
@endsection 
