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
        Schema::create('parques', function (Blueprint $table) {
            $table->integer('idParque')->primary();
            $table->integer('idMunicipio');
            $table->string('Nombre');
            $table->timestamps();

            $table->foreign('idMunicipio')
                  ->references('idMunicipio')
                  ->on('municipios')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parques');
    }
};
