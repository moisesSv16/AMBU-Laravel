<x-app-layout>
</x-app-layout>
    @extends('layouts.plantillabase')

@section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
 @endsection

@section('contenido')

<h2 class="text-white text-center">Hecer un pedido para cotización</h2>
<br>
<div class="container col-6">
  <h5 class="text-white text-center col-12">Si busca algun otro producto que no se encuentre en nuestro inventario puede descargar el catalogo de nuestro provedor</h5>
    <center><a href="{{ route('descargar.pdf') }}" class="btn btn-primary" >Descargar PDF</a></center>
</div>


<form action="/pedidos" method="POST" onsubmit="return confirm('¿Estás seguro de enviar el pedido?')">
    @csrf
    <div>
        <label for="" class="form-label text-white">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control" placeholder ='Ingrese su nombre' tabindex="1" required>
    </div>
    <div>
        <label for="" class="form-label text-white">Correo</label>
        <input type="text" id="correo" name="correo" class="form-control" placeholder ='Ingrese su correo electronico' tabindex="2" required>
    </div>
    <div>
        <label for="" class="form-label text-white">Telefono</label>
        <input type="text" id="telefono" name="telefono" class="form-control" placeholder ='Ingrese su numero telefonico' tabindex="3" required>
    </div>
    <div id="contenedorInputs">
        <label for="" class="form-label text-white">Producto</label>
        <input type="text" id="producto1" name="producto1" class="form-control" tabindex="4" placeholder ='Ingrese el nombre o codigo del producto' required>

        <label for="" class="form-label text-white">Cantidad</label>
        <input type="number" id="cantidad1" name="cantidad1" class="form-control" tabindex="5"placeholder = 'Ingrese la cantidad' required>
    </div> 
    <input type="hidden" id="contador" name="contador" value="1">
    
  
   
    <br>
    <a href="/" class="btn btn-secondary" tabindex="10">Cancelar</a>
    <button type="button" onclick="agregarInput()" class="btn btn-success">Agregar Producto</button>
    <button type="submit" class="btn btn-primary" tabindex="11">Guardar</button>
</form>
<br>
<script>
let contador = 2;

function agregarInput() {
    // Crear un nuevo input
    const nuevoLabel = document.createElement('label');
            nuevoLabel.for = 'producto' + contador;
            nuevoLabel.innerHTML = 'Producto ' + contador;
            nuevoLabel.classList.add('text-white');

    const nuevoInput = document.createElement('input');
    nuevoInput.type = 'text';
    nuevoInput.class = 'form-control';
    nuevoInput.name = 'producto' + contador;
    nuevoInput.required = true; 
    nuevoInput.placeholder = 'Ingrese el nombre o codigo del producto';
    //nuevoInput.placeholder = 'Producto ' + contador;
    nuevoInput.classList.add('form-control');

    const nuevoLabelm = document.createElement('label');
            nuevoLabelm.for = 'cantidad' + contador;
            nuevoLabelm.innerHTML = 'Cantidad ' + contador;
            nuevoLabelm.classList.add('text-white');

    const nuevoInputm = document.createElement('input');
    nuevoInputm.type = 'number';
    nuevoInputm.class = 'form-control';
    nuevoInputm.name = 'cantidad' + contador;
    nuevoInputm.required = true; 
    nuevoInputm.placeholder = 'Ingrese la cantidad';
   // nuevoInputm.placeholder = 'Cantidad ' + contador;
    nuevoInputm.classList.add('form-control');


    // Agregar el nuevo input al contenedor
    document.getElementById('contenedorInputs').appendChild(nuevoLabel);
    document.getElementById('contenedorInputs').appendChild(nuevoInput);
    document.getElementById('contenedorInputs').appendChild(nuevoLabelm);
    document.getElementById('contenedorInputs').appendChild(nuevoInputm);

    document.getElementById('contador').value = contador;
    // Incrementar el contador
    contador++;
}
</script>
@endsection 

