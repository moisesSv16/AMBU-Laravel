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
        Schema::create('incidencia_puntos_limpios', function (Blueprint $table) {
            $table->bigIncrements('idSolicitud');
            $table->integer('idTipo');
            $table->string('Solicitud_incidencia');
            $table->string('Descripcion');
            $table->timestamps();

            $table->foreign('idTipo')
                  ->references('idTipo')
                  ->on('tipo_de_incidencias')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidencia_puntos_limpios');
    }
};
