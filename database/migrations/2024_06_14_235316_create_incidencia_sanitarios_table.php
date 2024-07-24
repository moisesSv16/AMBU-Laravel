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
        Schema::create('incidencia_sanitarios', function (Blueprint $table) {
            $table->id();
            $table->string('Parque');
            $table->string('Nombre');
            $table->string('Solicitud');
            $table->string('Descripcion');
            $table->string('Imagen');
            $table->string('Estado'); 
            $table->timestamps();

            /*$table->foreign('idTipo')
                  ->references('idTipo')
                  ->on('tipo_de_incidencias')
                  ->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidencia_sanitarios');
    }
};
