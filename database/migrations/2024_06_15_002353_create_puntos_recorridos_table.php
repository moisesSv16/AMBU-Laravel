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
        Schema::create('puntos_recorridos', function (Blueprint $table) {
            $table->bigIncrements('idPuntoRecorrido');
            $table->integer('idParque');
            $table->string('Nombre');
            $table->timestamps();

            $table->foreign('idParque')
                  ->references('idParque')
                  ->on('parques')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puntos_recorridos');
    }
};
