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
        Schema::create('incidencia_seguridads', function (Blueprint $table) {
            $table->id();
            $table->string('Parque');
            $table->string('Municipio');
            $table->string('Nombre');
            $table->string('Observaciones');
            $table->string('Media');
            $table->string('Tipo');
            $table->string('Actividad');
            $table->string('Arma');
            $table->string('Transporte');
            $table->string('Hora');
            $table->string('Llamada');
            $table->string('Numero');
            $table->string('Imagen');
            $table->string('Estado');   
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidencia_seguridads');
    }
};
