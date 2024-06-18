<x-app-layout>
</x-app-layout>
 @extends('layouts.plantillabase')

 @section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
 @endsection

 @section('contenido')
 <h1 class="text-white text-center" >Mis Maquinarias y Herramientas</h1>
 
 <a href="maquinarias/create" class="btn btn-success mb-3">Agregar Maquinaria</a>

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
            <th scope="col">Descripción</th>
            <th scope="col">Ubicación</th>
            <th scope="col">Precio</th>
            <th scope="col">Imagen</th>
            <th scope="col">Acciones</th>
         
            
        </tr>
    </thead>
    <tbody>
        @foreach($maquinarias as $maquinaria)
        <tr>
  
            <td>{{$maquinaria->nombre}}</td>
            <td>{{$maquinaria->descripcion}}</td>
            <td>{{$maquinaria->ubicacion}}</td>
            <td>{{$maquinaria->costo}}</td>
            <td><img src="{{asset($maquinaria->imagen)}}" alt="" class="imgR"></td>
            <td>
                <form action="{{route ('maquinarias.destroy',$maquinaria->id)}}" method="POST" onsubmit="return confirm('¿Estás seguro que desea eliminar la maquinaria?')">

                <a class="btn btn-info" href="/maquinarias/{{$maquinaria->id}}/edit">Editar</a>
                
                @csrf
                @method('DELETE')
                <br>
                <br>
                <button type="submit" class="btn btn-danger" >Borrar</button>
                </form>
            </td>
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
