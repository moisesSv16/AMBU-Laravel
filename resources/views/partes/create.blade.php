<x-app-layout>
</x-app-layout>
@extends('layouts.plantillabase')

@section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
 @endsection

@section('contenido')

<h2  class="text-white text-center">Guardar Registro de Producto</h2>

<form action="/partes" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="" class="form-labe text-white">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control" placeholder ='Ingrese el nombre del producto' tabindex="1">
    </div>
    <div>
        <label for="" class="form-label text-white">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder ='Ingrese la descripción' tabindex="2">
    </div>
    <div>
        <label for="" class="form-label text-white">Codigo</label>
        <input type="text" id="codigo" name="codigo" class="form-control" placeholder ='Ingrese el codigo del producto' tabindex="3">
    </div>
    <div>
        <label for="" class="form-label text-white">Folio de Nota</label>
        <input type="text" id="folio" name="folio" class="form-control" placeholder ='Ingrese el folio de la nota de compra del producto' tabindex="4">
    </div> <div>
        <label for="" class="form-label text-white">Existencias</label>
        <input type="number" id="existencias" name="existencias" class="form-control" placeholder ='Ingrese las existencias del producto' tabindex="5">
    </div> <div>
        <label for="" class="form-label text-white">Categoria</label>
        <input type="text" id="categoria" name="categoria" class="form-control" placeholder ='Ingrese la categoria del producto' tabindex="6">
    </div> <div>
        <label for="" class="form-label text-white">Precio</label>
        <input type="number" id="precio" name="precio" class="form-control" placeholder ='Ingrese precio del producto' tabindex="7">
    </div>
    <br>
    <div>
        <label for="" class="form-label text-white">Zona</label>
        <select name="zona" class="form-control">
        @foreach($estantes as $estante)
        <option value="{{ $estante->lugar }}">{{ $estante->lugar }}</option>
          @endforeach
        </select>
    
    </div>
    <div>
        <label for="" class="form-label text-white">Imagen</label>
        <input type="file" id="imagen" name="imagen" class="form-control" tabindex="9">
    </div>
    <br>
    <a href="/partes" class="btn btn-secondary" tabindex="10">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="11">Guardar</button>
</form>
@endsection 

