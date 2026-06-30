<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TorneoController;
use App\Http\Controllers\MiembroController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\Admin\AdminUserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::middleware(['role:Administrador'])
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            Route::get(
                '/usuarios',
                [AdminUserController::class, 'index']
            )->name('usuarios.index');

            Route::patch(
                '/usuarios/{user}/rol',
                [AdminUserController::class, 'updateRole']
            )->name('usuarios.updateRole');

        });

    // Dashboard General
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Rutas de Torneos
    |--------------------------------------------------------------------------
    */
    Route::resource('torneos', TorneoController::class);

    Route::get(
        'torneos-eliminados',
        [TorneoController::class, 'eliminados']
    )->name('torneos.eliminados');

    Route::patch(
        'torneos/{id}/restore',
        [TorneoController::class, 'restore']
    )->name('torneos.restore');

    /*
    |--------------------------------------------------------------------------
    | Recurso Anidado para Partidos de un Torneo
    |--------------------------------------------------------------------------
    */
    Route::resource(
        'torneos.partidos',
        PartidoController::class
    );

    /*
    |--------------------------------------------------------------------------
    | Rutas para la gestión de Miembros del Torneo
    |--------------------------------------------------------------------------
    */
    Route::post(
        'torneos/{torneo}/miembros',
        [MiembroController::class, 'store']
    )->name('miembros.store');

    Route::patch(
        'torneos/{torneo}/miembros/{user}',
        [MiembroController::class, 'update']
    )->name('miembros.update');

    Route::delete(
        'torneos/{torneo}/miembros/{user}',
        [MiembroController::class, 'destroy']
    )->name('miembros.destroy');

    /*
    |--------------------------------------------------------------------------
    | Rutas para la gestión de Comentarios de Partidos
    |--------------------------------------------------------------------------
    */
    Route::post(
        'partidos/{partido}/comentarios',
        [ComentarioController::class, 'store']
    )->name('comentarios.store');

    Route::put(
        'comentarios/{comentario}',
        [ComentarioController::class, 'update']
    )->name('comentarios.update');

    Route::delete(
        'comentarios/{comentario}',
        [ComentarioController::class, 'destroy']
    )->name('comentarios.destroy');

    /*
    |--------------------------------------------------------------------------
    | Rutas de Administración (Roles y Permisos Spatie)
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:Administrador')->group(function () {
        Route::get('/admin', function () {
            return 'Panel Administrador';
        });
    });

    Route::middleware('permission:crear torneo')->group(function () {
        Route::get('/organizador', function () {
            return 'Panel Organizador';
        });
    });

});

require __DIR__ . '/auth.php';