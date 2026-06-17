<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partidos', function (Blueprint $table) {

            $table->id();

            $table->foreignId('torneo_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('responsable_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('titulo');

            $table->text('descripcion')->nullable();

            $table->enum('estado',[
                'pendiente',
                'en_progreso',
                'completado'
            ])->default('pendiente');

            $table->enum('prioridad',[
                'baja',
                'media',
                'alta'
            ])->default('media');

            $table->date('fecha_partido')->nullable();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partidos');
    }
};