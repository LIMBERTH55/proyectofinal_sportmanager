<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::view('/dashboard', 'dashboard')
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Rutas de Administración
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:Administrador')->group(function () {

        Route::get('/admin', function () {
            return 'Panel Administrador';
        });

    });

    /*
    |--------------------------------------------------------------------------
    | Rutas Organizador
    |--------------------------------------------------------------------------
    */

    Route::middleware('permission:crear torneo')->group(function () {

        Route::get('/organizador', function () {
            return 'Panel Organizador';
        });

    });

});

require __DIR__.'/auth.php';