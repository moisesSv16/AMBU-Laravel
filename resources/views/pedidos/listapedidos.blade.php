
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Pedidos</title>
        <style>
        h1{
        text-align: center;
        text-transform: uppercase;
        }
        .contenido{
        font-size: 20px;
        }
        #primero{
        background-color: #ccc;
        }
        #segundo{
        color:#44a359;
        }
        #tercero{
        text-decoration:line-through;
        }
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    </style>
    </head>
    <body>
        <h1>Lista de Pedidos</h1>
        <hr>
        <table class="table table-dark table-striped mt-4" id="tabla">
    <thead>
        <tr>
            
        {{--   <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Telefono</th> --}} 
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            
        </tr>
    </thead>
    <tbody>
    @foreach($pedidos as $pedido)
        <tr>
            
      {{--      <td>{{$pedido->nombre}}</td>
            <td>{{$pedido->correo}}</td>
            <td>{{$pedido->telefono}}</td>  --}} 
            
            @php

            $productos_decodificados = json_decode($pedido->producto, true);
            @endphp
            <td>
            @foreach($productos_decodificados as $index => $producto)

               {{ $producto }}
               <br>
    
            @endforeach
            </td>

            @php

            $cantidades_decodificadas = json_decode($pedido->cantidad, true);
            @endphp
            <td>
            @foreach($cantidades_decodificadas as $index => $cantidad)

            
            {{ $cantidad }}
            <br>

            @endforeach
            </td>
            

            
            
        </tr>
        @endforeach
    </tbody>
 </table>
    </body>
</html>