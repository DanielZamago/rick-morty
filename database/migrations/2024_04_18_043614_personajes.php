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
        Schema::create('personajes', function (Blueprint $table) {
            $table->id();
            $table->integer('idPersonaje');
            $table->string('nombre')->nullable();
            $table->string('especie')->nullable();
            $table->string('estado')->nullable();
            $table->string('tipo')->nullable();
            $table->string('genero')->nullable();
            $table->string('nombreOrigen')->nullable();
            $table->string('imagen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personajes');
    }
};
