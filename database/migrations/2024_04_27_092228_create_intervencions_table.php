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
        Schema::create('intervencions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('psh_id');
            $table->enum('campo', ['psicologia', 'trabajo_social', 'dispositivo_acogida']);
            $table->enum('area', ['social', 'economica', 'laboral', 'vivienda', 'sanitaria', 'incidencia', 'observación']);
            $table->text('descripcion');
            $table->date('fecha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intervencions');
    }
};
