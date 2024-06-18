<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', 'App\Http\Controllers\MaquinariasController@ver');
Route::get('/galeria', 'App\Http\Controllers\MaquinariasController@galeria');

Route::get('/loginmovil', 'App\Http\Controllers\AuthController@login');
Route::get('/usuario/{id}', 'App\Http\Controllers\AuthController@usuario')->name('usuario');
Route::post('/rentascancelar', [App\Http\Controllers\RentasController::class, 'rentascancelar'])->name('rentascancelar');

Route::get('/rentasmovil/{id}', 'App\Http\Controllers\RentasController@rentas')->name('rentasmovil');
Route::get('/rentasowner/{id}', 'App\Http\Controllers\RentasController@rentasowner')->name('rentasowner');
Route::post('/guardar', [App\Http\Controllers\IncidenciasController::class, 'guardar'])->name('guardar');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\PedidosController::class, 'index'])->name('dashboard');
    Route::resource('partes','App\Http\Controllers\PartesController');
    Route::resource('direcciones','App\Http\Controllers\DireccionesController');
    Route::resource('maquinarias','App\Http\Controllers\MaquinariasController');
    Route::resource('estantes','App\Http\Controllers\EstantesController');
    Route::resource('rentas','App\Http\Controllers\RentasController');
    Route::get('misrentas','App\Http\Controllers\RentasController@misrentas');

    //Route::post('/guardar', [App\Http\Controllers\RentasController::class, 'guardar'])->name('guardar');

    Route::post('/eliminar_lugares', [App\Http\Controllers\EstantesController::class, 'eliminarLugares'])->name('eliminar_lugares');
    Route::get('/eliminar', [App\Http\Controllers\EstantesController::class, 'eliminar'])->name('eliminar');
    Route::name('printPedidos')->get('/imprimirPedidos', '\App\Http\Controllers\PedidosController@imprimirPedidos');
    Route::post('/descuento/{id}', 'App\Http\Controllers\PartesController@aplicarDescuento')->name('descuento');
    Route::get('/grafica', 'App\Http\Controllers\PartesController@grafica');
    
});
Route::get('/descargar-pdf', [App\Http\Controllers\PedidosController::class, 'descargarPDF'])->name('descargar.pdf');

Route::get('/herramientasindex', 'App\Http\Controllers\MovilController@index');

Route::get('/pedidosindex', 'App\Http\Controllers\PartesmovilController@pedidos');

Route::get('/partescreate', 'App\Http\Controllers\PartesmovilController@create');

Route::get('/partesmostrar/{id}', 'App\Http\Controllers\PartesmovilController@show');

Route::post('/partesguardar', 'App\Http\Controllers\PartesmovilController@store');

Route::put('/partesmodificar/{id}', 'App\Http\Controllers\PartesmovilController@update');

Route::delete('/parteseliminar/{id}', 'App\Http\Controllers\PartesmovilController@destroy');

Route::get('nosotros', function() {
    return view('nosotros');
});


Route::resource('pedidos','App\Http\Controllers\PedidosController');
Route::get('/viewpartes', [App\Http\Controllers\PartesController::class, 'viewPartes'])->name('viewpartes');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
