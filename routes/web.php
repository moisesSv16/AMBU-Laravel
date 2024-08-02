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


Route::get('/', function () {
    return view('welcome');
});


Route::post('/guardar', [App\Http\Controllers\IncidenciasController::class, 'guardar'])->name('guardar');
Route::post('/fauna', [App\Http\Controllers\IncidenciasController::class, 'fauna'])->name('fauna');
Route::post('/seguridad', [App\Http\Controllers\IncidenciasController::class, 'seguridad'])->name('seguridad');
Route::post('/forestal', [App\Http\Controllers\IncidenciasController::class, 'forestal'])->name('forestal');
Route::post('/sanitarios', [App\Http\Controllers\IncidenciasController::class, 'sanitarios'])->name('sanitarios');


Route::get('/incidencias', 'App\Http\Controllers\IncidenciasController@mostrar');
Route::get('/mostrar_fauna', 'App\Http\Controllers\IncidenciasController@mostrar_fauna');
Route::get('/mostrar_sanitarios', 'App\Http\Controllers\IncidenciasController@mostrar_sanitarios');


Route::get('/mostrar', 'App\Http\Controllers\IncidenciasController@movil');

Route::get('/mostrarid/{id}', 'App\Http\Controllers\IncidenciasController@movilid')->name('mostrarid');








Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\PedidosController::class, 'index'])->name('dashboard');
  
    
});




