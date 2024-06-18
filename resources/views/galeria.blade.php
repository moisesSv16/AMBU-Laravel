<x-app-layout>
</x-app-layout>
 @extends('layouts.plantillabase')

 @section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
 @endsection

 <style>
        div.galeria{
            margin: 10px 20px;
            box-shadow: 0 4px 8px 0  lightskyblue, 0 6px 20px 0 rgba(0,0,0,0.19);
            float: left;
            width: 200px;
        }
        div.galeria img{
            width: 100%;
            height: 130px;
        }
        div.galeria:hover{
            border: 1px solid lightcoral;
            transform: rotate(-3deg);
        }
        div.pie{
            color:white;
            font-family: 'Arial', sans-serif;
            text-align: center;
            text-shadow: 2px 2px 5px blue;
            padding: 10px;
        }
        

  
        .imgR {
        width:230px;
        height:150px;
        }
        

        /* Estilos adicionales para el contenedor div */
        
    </style>
 @section('contenido')
 <h1 class="text-white text-center" >Maquinarias y Herramientas</h1>
 
 

 @if(session('alerta'))
    <div class="alert alert-warning">
        {{ session('alerta') }}
    </div>
@endif
<div class="table-responsive">
 <table class="table table-dark table-striped mt-4" id="tabla">
    <thead>
        <tr>
            
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Dirección</th>
            <th scope="col">Precio por día</th>
            <th scope="col">imagen</th>
            <th scope="col">Rentar</th>
            
        </tr>
    </thead>
    <tbody>
    @foreach($maquinarias as $maquinaria)
        <tr>
            
            <td>{{$maquinaria->nombre}}</td>
            <td>{{$maquinaria->descripcion}}</td>
            <td>{{$maquinaria->ubicacion}}</td>
            <td>${{$maquinaria->costo}}</td>
            <td><img src="{{asset($maquinaria->imagen)}}" alt="" class="imgR"></td>
            <td><a class="btn btn-info" href="/rentas/{{$maquinaria->id}}/edit">Rentar</a></td>
           
        </tr>
        @endforeach
    </tbody>
 </table>
</div>
                        
                              
                        

 @endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
    $('#tabla').DataTable({
        responsive: true,
        autoWidth: false
    });
    </script>
 @endsection
