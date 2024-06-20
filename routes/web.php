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


Route::post('/guardar', [App\Http\Controllers\IncidenciasController::class, 'guardar'])->name('guardar');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\PedidosController::class, 'index'])->name('dashboard');
  
    
});




