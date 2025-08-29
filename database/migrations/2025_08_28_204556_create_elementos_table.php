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
        Schema::create('elementos', function (Blueprint $table) {
            $table->id('idElemento');
            $table->string('codigo');
            $table->string('nombre');
            $table->string('caracteristicas');
            $table->string('foto');
            $table->foreignId('idTipo')->constrained('tipos','idTipo')->onDelete('cascade');
            $table->foreignId('idPersona')->constrained('personas','idPersona')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elementos');
    }
};
