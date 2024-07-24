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
        Schema::create('incidencia_mantenimiento_forestals', function (Blueprint $table) {
            $table->id();
            $table->string('Parque');
            $table->string('Municipio');
            $table->string('Nombre');
            $table->string('Folio');
            $table->string('Tipo');
            $table->string('Descripcion');
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
        Schema::dropIfExists('incidencia_mantenimiento_forestals');
    }
};
