<x-app-layout>
</x-app-layout>
@extends('layouts.plantillabase')
<title>Alquimaq</title>
@section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
 @endsection

@section('contenido')

<h2  class="text-white text-center">Guardar Dirección</h2>

<form action="/direcciones" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="" class="form-labe text-white">Calle</label>
        <input type="text" id="calle" name="calle" class="form-control" placeholder ='Ingrese el nombre de la calle' required tabindex="1">
    </div>
    <div>
        <label for="" class="form-label text-white">Numero</label>
        <input type="text" id="numero" name="numero" class="form-control" placeholder ='Ingrese el numero del edificio' required tabindex="2">
    </div>
    <div>
        <label for="" class="form-label text-white">Codigo Postal</label>
        <input type="text" id="codigo_postal" name="codigo_postal" class="form-control" placeholder ='Ingrese el codigo postal' required tabindex="3">
    </div>
    <div>
        <label for="" class="form-label text-white">Ciudad</label>
        <input type="text" id="ciudad" name="ciudad" class="form-control" placeholder ='Ingresela ciudad' required tabindex="4">
    </div> 
    <div>

        <input type="hidden" id="id_usuario" name="id_usuario" class="form-control" tabindex="9" value="{{ Auth::user()->id }}">
    </div>
    <br>
    <a href="/direcciones" class="btn btn-secondary" tabindex="10">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="11">Guardar</button>
</form>
@endsection 

