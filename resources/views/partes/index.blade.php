<x-app-layout>
</x-app-layout>
 @extends('layouts.plantillabase')

 @section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
 @endsection

 @section('contenido')
 <h1 class="text-white text-center" >Productos</h1>
 
 <a href="partes/create" class="btn btn-success mb-3">Agregar Producto</a>

 @if(session('alerta'))
    <div class="alert alert-warning">
        {{ session('alerta') }}
    </div>
@endif

 <div class="table-responsive">
 <table class="table table-dark table-striped mt-4" id="tabla">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Codigo</th>
            <th scope="col">Folio</th>
            <th scope="col">Existencias</th>
            <th scope="col">Categoria</th>
            <th scope="col">Precio</th>
            <th scope="col">Zona</th>
            <th scope="col">Imagen</th>
            <th scope="col">Acciones</th>
            <th scope="col">Unidades a descontar</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($partes as $parte)
        <tr>
            <td>{{$parte->id}}</td>
            <td>{{$parte->nombre}}</td>
            <td>{{$parte->descripcion}}</td>
            <td>{{$parte->codigo}}</td>
            <td>{{$parte->folio}}</td>
            <td>{{$parte->existencias}}</td>
            <td>{{$parte->categoria}}</td>
            <td>${{$parte->precio}}</td>
            <td>{{$parte->zona}}</td>
            <td><img src="{{asset($parte->imagen)}}" alt="100px" class="img-fluid" whidth="120px"></td>

            
            <td>
                <form action="{{route ('partes.destroy',$parte->id)}}" method="POST" onsubmit="return confirm('¿Estás seguro que desea eliminar el producto?')">

                <a class="btn btn-info" href="/partes/{{$parte->id}}/edit">Editar</a>
                
                @csrf
                @method('DELETE')
                <br>
                <br>
                <button type="submit" class="btn btn-danger" >Borrar</button>
                </form>
            </td>
            <td>
            <form action="{{ route('descuento', $parte->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que desea descontar esta cantidad?')">
                <input type="number" name="descuento" class="form-control" min="1" max="{{$parte->existencias}}">
            <br>
                <form action="{{ route('descuento', $parte->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger" >Descontar</button>
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
