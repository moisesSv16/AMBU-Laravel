<x-app-layout>
</x-app-layout>
 @extends('layouts.plantillabase')

 @section('css')

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
 @endsection

 @section('contenido')
 <h1 class="text-white text-center">Productos</h1>

<div class="table-responsive">
 <table class="table table-dark table-striped mt-4" id="tabla">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Codigo</th>
            <th scope="col">Existencias</th>
            <th scope="col">Categoria</th>
            <th scope="col">Precio</th>
            <th scope="col">Imagen</th>
        </tr>
    </thead>
    <tbody>
        @foreach($partes as $parte)
        <tr>
            <td>{{$parte->id}}</td>
            <td>{{$parte->nombre}}</td>
            <td>{{$parte->descripcion}}</td>
            <td>{{$parte->codigo}}</td>
            <td>{{$parte->existencias}}</td>
            <td>{{$parte->categoria}}</td>
            <td>${{$parte->precio}}</td>
            <td><img src="{{asset($parte->imagen)}}" alt="100px" class="img-fluid" whidth="120px"></td>


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
