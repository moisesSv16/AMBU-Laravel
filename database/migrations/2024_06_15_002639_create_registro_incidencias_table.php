<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registro_incidencias', function (Blueprint $table) {
            $table->bigIncrements('idIncidencia');
            $table->integer('idUsuario');
            $table->integer('idPuntoRecorrido');
            $table->integer('idTipo');
            $table->string('idSolicitud');
            $table->string('Descripcion');
            $table->string('Imagen');       
            $table->string('Estado');       
            $table->timestamps();

            /*$table->foreign('idUsuario')->references('idUsuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('idPuntoRecorrido')->references('idPuntoRecorrido')->on('puntos_recorridos')->onDelete('cascade');
            $table->foreign('idTipo')->references('idTipo')->on('tipo_de_incidencias')->onDelete('cascade');*/


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_incidencias');
    }
};
