<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('partidos', function (Blueprint $table) {

            $table->id();

            $table->foreignId('torneo_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('equipo_local');

            $table->string('equipo_visitante');

            $table->date('fecha');

            $table->time('hora');

            $table->string('lugar');

            $table->enum('estado', [
                'programado',
                'en_juego',
                'finalizado',
                'suspendido'
            ])->default('programado');

            $table->foreignId('responsable_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->integer('marcador_local')
                ->default(0);

            $table->integer('marcador_visitante')
                ->default(0);

            $table->softDeletes();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partidos');
    }
};
