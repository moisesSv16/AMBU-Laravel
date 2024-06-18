<x-app-layout>
</x-app-layout>
 @extends('layouts.plantillabase')

 @section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
 @endsection

 @section('contenido')
 <h1 class="text-white text-center" >Mis Direcciones</h1>
 
 <a href="direcciones/create" class="btn btn-success mb-3">Agregar Dirección</a>

 @if(session('alerta'))
    <div class="alert alert-warning">
        {{ session('alerta') }}
    </div>
@endif

 <div class="table-responsive">
 <table class="table table-dark table-striped mt-4" id="tabla">
    <thead>
        <tr>
            
            <th scope="col">Calle</th>
            <th scope="col">Numero</th>
            <th scope="col">Codigo Postal</th>
            <th scope="col">Ciudad</th>
            <th scope="col">Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($direcciones as $direccion)
        <tr>
            
            <td>{{$direccion->calle}}</td>
            <td>{{$direccion->numero}}</td>
            <td>{{$direccion->codigo_postal}}</td>
            <td>{{$direccion->ciudad}}</td> 
            <td>
                <form action="{{route ('direcciones.destroy',$direccion->id)}}" method="POST" onsubmit="return confirm('¿Está seguro que desea eliminar la dirección?')">

                <a class="btn btn-info" href="/direcciones/{{$direccion->id}}/edit">Editar</a>
                
                @csrf
                @method('DELETE')
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
