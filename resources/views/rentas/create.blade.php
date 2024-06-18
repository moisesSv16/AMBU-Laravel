<x-app-layout>
</x-app-layout>
@extends('layouts.plantillabase')

@section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
 @endsection

@section('contenido')

<h2  class="text-white text-center">Renta de Maquinaria o Herramienta</h2>

<form action="/rentas" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="" class="form-labe text-white">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control" value="{{ Auth::user()->name }}" required tabindex="1">
    </div>
    <div>
    <input type="hidden" id="id_usuario" name="id_usuario" class="form-control"  value="{{ Auth::user()->id }}">
    </div>
    <div>
        <label for="" class="form-label text-white">Nombre de la Maquinaria</label>
        <input type="text" id="nombre_maquinaria" name="nombre_maquinaria" class="form-control" value="{{ $maquinaria->nombre}}" required tabindex="2">
    <input type="hidden" id="id_maquinaria" name="id_maquinaria" class="form-control"  value="{{ $maquinaria->id }}">
    <input type="hidden" id="id_owner" name="id_owner" class="form-control"  value="{{ $maquinaria->id_usuario }}">

    </div>
    
    <div>
        <label for="" class="form-label text-white">Precio de renta por dia</label>
        <input type="text" id="precio" name="precio" class="form-control" value="{{ $maquinaria->costo}}" required tabindex="2">
    </div>
   <div>
        <label for="" class="form-label text-white">Fecha de inicio</label>
        <input type="date" id="fecha_entrega" name="fecha_entrega" class="form-control" required tabindex="5">
    </div> 
    <div>
        <label for="" class="form-label text-white">Fecha de Entrega</label>
        <input type="date" id="fecha_regreso" name="fecha_regreso" class="form-control" required tabindex="5">
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
    <label class="form-label text-white">¿Requiere Operario?</label>
    <div>
        <input type="radio" id="entrega_requerida_si" name="operario" value="500">
        <label for="entrega_requerida_si">Sí</label>
    </div>
    <div>
        <input type="radio" id="entrega_requerida_no" name="operario" value="0">
        <label for="entrega_requerida_no">No</label>
    </div>
</div>
    <div>
        <label for="" class="form-label text-white">Imagen</label>
        <input type="hidden" value="{{$maquinaria->imagen}}" id="imagen" name="imagen" class="form-control col-6" tabindex="3">
        <br>
        <img src="{{asset($maquinaria->imagen)}}" alt="100px" class="img-fluid col-2" whidth="120px">
    </div>
    <br>
   
    
    <br>
    <a href="{{ url('/galeria')}}" class="btn btn-secondary" tabindex="10">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="11">Guardar</button>
</form>
@endsection 

@section('js')
    <script>
    // Obtener el input de fecha
    var inputFecha = document.getElementById('fecha_entrega');
    var inputFecha2 = document.getElementById('fecha_regreso');


    // Obtener la fecha actual en formato yyyy-mm-dd
    var fechaActual = new Date();
    
    var fechaMin = new Date();
    fechaMin.setDate(fechaActual.getDate()); // Sumar 2 días para obtener el día siguiente al actual

    // Formatear la fecha mínima en formato yyyy-mm-dd
    var formattedFechaMin = fechaMin.toISOString().split('T')[0];

    var fechaActuals = new Date();

    // Obtener la fecha mínima permitida (día siguiente al actual)
    var fechaMinima = new Date();
    fechaMinima.setDate(fechaActuals.getDate() + 1); // Sumar 2 días para obtener el día siguiente al actual

    // Formatear la fecha mínima en formato yyyy-mm-dd
    var formattedFechaMinima = fechaMinima.toISOString().split('T')[0];
    // Establecer la fecha mínima como la fecha actual
    inputFecha.setAttribute('min', formattedFechaMin);
    inputFecha2.setAttribute('min', formattedFechaMinima);
    </script>
 @endsection