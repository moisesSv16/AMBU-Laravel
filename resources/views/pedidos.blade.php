<x-app-layout>
</x-app-layout>
 @extends('layouts.plantillabase')

 @section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
 <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .containerr {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .card-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .card {
            flex: 0 1 calc(33.33% - 20px);
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            margin-top: 0;
            font-size: 24px;
            color: #333;
        }

        .card p {
            font-size: 18px;
            color: #666;
        }
    </style>
 @endsection

@section('contenido')
 <h1 class=" text-white text-center">Alquimaq</h1>
 <body>
    <div class="containerr">
        <h1 class="heading">Mis Datos en Alquimaq</h1>
        <div class="card-container">
            <div class="card">
                <h2>Numero de arrendamientos: {{ $datos['rentas_del_mes'] }}</h2>
            </div>
            <div class="card">
                <h2>Ganancias: ${{ $datos['ganancias'] }}</h2>
            </div>
            <div class="card">
                <h2>Maquinarias registradas: {{ $datos['maquinarias'] }}</h2>
            </div>
            <div class="card">
                <h2>Mis Maquinarias actualmente rentadas: {{ $datos['maquinarias_rentadas'] }}</h2>
            </div>
            <div class="card">
                <h2>Mis Maquinarias disponibles: {{ $datos['disponibles'] }}</h2>
            </div>
            <div class="card">
                <h2>Direcciones registradas: {{ $datos['direcciones'] }}</h2>
            </div>
            <div class="card">
                <h2>Numero de maquinarias que rente: {{ $datos['rentas_echas'] }}</h2>
            </div>
            <div class="card">
                <h2>Maquinarias actualmente rentadas: {{ $datos['rentas_activas'] }}</h2>
            </div>
            <div class="card">
                <h2>Gastos: ${{ $datos['gasto'] }}</h2>
            </div>
        </div>
    </div>
</body>


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
