<x-app-layout>
</x-app-layout>
 @extends('layouts.plantillabase')

 @section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
 @endsection

 @section('contenido')
 <h1 class="text-white text-center" >Mis Rentas</h1>
 
 

 @if(session('alerta'))
    <div class="alert alert-warning">
        {{ session('alerta') }}
    </div>
@endif
<style>
    .imgR {
        width:230px;
        height:150px;
        }
</style>
 <div class="table-responsive">
 <table class="table table-dark table-striped mt-4" id="tabla">
    <thead>
        <tr>
 
            <th scope="col">Nombre</th>
            <th scope="col">Nombre de la Maquinaria</th>
            <th scope="col">Dirección</th>
            <th scope="col">Inicio de la Renta</th>
            <th scope="col">Fecha de entrega de la Renta</th>
            <th scope="col">Dias Rentados</th>
            <th scope="col">Costo del operador</th>
            <th scope="col">Total</th>

            
        </tr>
    </thead>
    <tbody>
        @foreach($rentas as $renta)
        <tr>
  
            <td>{{$renta->nombre}}</td>
            <td>{{$renta->nombre_maquinaria}}</td>
            <td>{{$renta->direccion}}</td>
            <td>{{$renta->fecha_entrega}}</td>
            <td>{{$renta->fecha_regreso}}</td>
            <td>{{$renta->dias}}</td>
            <td>${{$renta->operador}}</td>
            <td>${{$renta->costo}}</td>

            
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
