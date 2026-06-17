<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('torneos', function (Blueprint $table) {

            $table->id();

            $table->string('nombre');
            $table->text('descripcion')->nullable();

            $table->enum('estado', [
                'planificado',
                'activo',
                'finalizado'
            ])->default('planificado');

            $table->foreignId('owner_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('torneos');
    }
};