<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use App\Models\Partido;
use App\Models\Comentario;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [

            'totalTorneos' => Torneo::count(),

            'totalPartidos' => Partido::count(),

            'totalUsuarios' => User::count(),

            'totalComentarios' => Comentario::count(),

            'programados' => Partido::where('estado', 'programado')->count(),

            'enJuego' => Partido::where('estado', 'en_juego')->count(),

            'finalizados' => Partido::where('estado', 'finalizado')->count(),

            'suspendidos' => Partido::where('estado', 'suspendido')->count(),

            'ultimosTorneos' => Torneo::latest()->take(5)->get(),

            'ultimosPartidos' => Partido::latest()->take(5)->get()

        ]);
    }
}