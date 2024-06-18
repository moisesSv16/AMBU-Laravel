<x-app-layout>
</x-app-layout>
@extends('layouts.plantillabase')

@section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
 <style>
    .etiqueta-negrita {
        font-weight: bold;
    }
 </style>
 <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .credit-card-form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-submit {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-submit:hover {
            background-color: #0056b3;
        }
    </style>
 @endsection

@section('contenido')
<body>
    
<h2  class="text-center">Confirmación de Renta</h2>

<form action="/guardar" method="POST" enctype="multipart/form-data">
    @csrf

<center>
    <div>
        <label for="" class="form-labe text-center etiqueta-negrita" >Nombre:</label>
        <label for="" class="form-labe text-center">{{$guardar['nombre']}}</label>
        <input type="hidden" id="nombre" name="nombre" class="form-control" value="{{ Auth::user()->name }}" tabindex="1">
    </div>

    <div>
    <input type="hidden" id="id_usuario" name="id_usuario" class="form-control"  value="{{ Auth::user()->id }}">
    <input type="hidden" id="id_maquinaria" name="id_maquinaria" class="form-control"  value="{{$guardar['id_maquinaria']}}">
    <input type="hidden" id="id_owner" name="id_owner" class="form-control"  value="{{$guardar['id_owner']}}">

    </div>
    
    <div>
        <label for="" class="form-labe text-center etiqueta-negrita">Nombre de la Maquinaria:</label>
        <label for="" class="form-labe text-center">{{$guardar['nombre_maquinaria']}}</label>
        <input type="hidden" id="nombre_maquinaria" name="nombre_maquinaria" class="form-control" value="{{ $guardar['nombre_maquinaria']}}" tabindex="2">
    </div>
    <div>
        <label for="" class="form-labe text-center etiqueta-negrita">Dirección:</label>
        <label for="" class="form-labe text-center">{{$guardar['ubicacion']}}</label>
        <input type="hidden" id="direccion" name="direccion" class="form-control" value="{{ $guardar['ubicacion']}}" tabindex="2">
    </div>
    <div>
        <label for="" class="form-labe text-center etiqueta-negrita">Inicio de la Renta:</label>
        <label for="" class="form-labe text-center">{{$guardar['fecha_entrega']}}</label>
        <input type="hidden" id="fecha_entrega" name="fecha_entrega" class="form-control" value="{{ $guardar['fecha_entrega']}}" tabindex="5">
    </div> 
    <div>
        <label for="" class="form-labe text-center etiqueta-negrita">Finalización de la Renta:</label>
        <label for="" class="form-labe text-center">{{$guardar['fecha_regreso']}}</label>
        <input type="hidden" id="fecha_regreso" name="fecha_regreso" class="form-control" value="{{ $guardar['fecha_regreso']}}" tabindex="5">
    </div> 
    <div>
        <label for="" class="form-labe text-center etiqueta-negrita">Dias de Renta:</label>
        <label for="" class="form-labe text-center">{{$guardar['dias']}}</label>
        <input type="hidden" id="dias" name="dias" class="form-control" value="{{ $guardar['dias']}}" tabindex="2">
    </div>
    <div>
        <label for="" class="form-labe text-center etiqueta-negrita">Costo de los dias de Renta:</label>
        <label for="" class="form-labe text-center">${{$guardar['precio']}}</label>
        <input type="hidden" id="precio" name="precio" class="form-control" value="{{ $guardar['precio']}}" tabindex="2">
    </div>
   
    <div>
        <label for="" class="form-labeltext-center etiqueta-negrita">Costo del Operador:</label>
        <label for="" class="form-labe text-center">${{$guardar['operario']}}</label>
        <input type="hidden" id="operador" name="operador" class="form-control" value="{{$guardar['operario']}}" tabindex="2">
    </div>
    <div>
        <label for="" class="form-labe text-center etiqueta-negrita">Total:</label>
        <label for="" class="form-labe text-center">${{$guardar['total']}}</label>
        <input type="hidden" id="costo" name="costo" class="form-control" value="{{$guardar['total']}}" tabindex="2">
    </div>
    <div>
        
        
        <br>
        <img src="{{asset($guardar['imagen'])}}" alt="100px" class="img-fluid col-2" whidth="120px">
    </div>
    <div>

    <div class="credit-card-form">
        <h2>Introduce los Datos de tu Tarjeta</h2>

            <div class="form-group">
                <label for="numero_tarjeta" class="form-label">Número de Tarjeta:</label>
                <input type="text" id="numero_tarjeta" name="numero_tarjeta" class="form-input" placeholder="1234 5678 9012 3456" maxlength="16" required>
            </div>
            <div class="form-group">
                <label for="nombre_tarjeta" class="form-label">Nombre del Titular:</label>
                <input type="text" id="nombre_tarjeta" name="nombre_tarjeta" class="form-input" placeholder="Nombre Apellido" required>
            </div>
            <div class="form-group">
                <label class="form-label">Fecha de Vencimiento:</label>
                <div style="display: flex;">
                    <input type="text" id="mes_vencimiento" name="mes_vencimiento" class="form-input" placeholder="MM" maxlength="2" style="width: calc(50% - 5px);" required>
                    <span style="margin: 0 5px;">/</span>
                    <input type="text" id="ano_vencimiento" name="ano_vencimiento" class="form-input" placeholder="AAAA" maxlength="4" style="width: calc(50% - 5px);" required>
                </div>
            <div class="form-group">
                <label for="cvv" class="form-label">CVV:</label>
                <input type="text" id="cvv" name="cvv" class="form-input" placeholder="123" maxlength="3" required>
            </div>
     
        
    </div>
    <br>
    <label for="" class="form-label text-center etiqueta-negrita"><a href="{{ route('descargar.pdf') }}" class="" >Términos y Condiciones</a></label>

        <input type="checkbox" id="" name="" class="" required tabindex="2">
    </div>
    
    <a href="{{ url('/galeria')}}" class="btn btn-secondary" tabindex="10">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="11">Confirmar</button>
    </center>
    <br>
</form>
@endsection 

@section('js')
    <script>
    // Obtener el input de fecha
    var inputFecha = document.getElementById('fecha_entrega');
    var inputFecha2 = document.getElementById('fecha_regreso');


    // Obtener la fecha actual en formato yyyy-mm-dd
    var fechaActual = new Date().toISOString().split('T')[0];
  

    var fechaActuals = new Date();

    // Obtener la fecha mínima permitida (día siguiente al actual)
    var fechaMinima = new Date();
    fechaMinima.setDate(fechaActuals.getDate() + 1); // Sumar 2 días para obtener el día siguiente al actual

    // Formatear la fecha mínima en formato yyyy-mm-dd
    var formattedFechaMinima = fechaMinima.toISOString().split('T')[0];
    // Establecer la fecha mínima como la fecha actual
    inputFecha.setAttribute('min', fechaActual);
    inputFecha2.setAttribute('min', formattedFechaMinima);
    
    
</script>
 @endsection