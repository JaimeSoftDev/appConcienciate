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
        Schema::create('solucituds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('psh_id');
            $table->string('articulo_solicitado');
            $table->enum('estado', ['solicitado', 'proceso', 'realizado']);
            $table->date('fecha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solucituds');
    }
};
