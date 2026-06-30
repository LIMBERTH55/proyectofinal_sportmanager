<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\Torneo;
use App\Models\User;
use App\Http\Requests\StorePartidoRequest;
use App\Http\Requests\UpdatePartidoRequest;
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    /**
     * Listar partidos del torneo
     */
    public function index(Torneo $torneo)
    {
        $this->authorize('view', $torneo);

        $partidos = $torneo->partidos()
            ->with('responsable')
            ->orderBy('fecha')
            ->orderBy('hora')
            ->paginate(10);

        return view('partidos.index', compact(
            'torneo',
            'partidos'
        ));
    }

    /**
     * Formulario crear partido
     */
    public function create(Torneo $torneo)
    {
        $this->authorize('update', $torneo);

        $usuarios = User::orderBy('name')->get();

        return view('partidos.create', compact(
            'torneo',
            'usuarios'
        ));
    }

    /**
     * Guardar partido
     */
    public function store(
        StorePartidoRequest $request,
        Torneo $torneo
    ) {

        $this->authorize('update', $torneo);

        Partido::create([

            'torneo_id' => $torneo->id,

            'equipo_local' => $request->equipo_local,

            'equipo_visitante' => $request->equipo_visitante,

            'fecha' => $request->fecha,

            'hora' => $request->hora,

            'lugar' => $request->lugar,

            'estado' => $request->estado,

            'responsable_id' => $request->responsable_id,

            'marcador_local' => $request->marcador_local ?? 0,

            'marcador_visitante' => $request->marcador_visitante ?? 0,

        ]);

        return redirect()
            ->route('torneos.partidos.index', $torneo)
            ->with('success', 'Partido registrado correctamente.');
    }

    /**
     * Ver partido
     */
    public function show(
        Torneo $torneo,
        Partido $partido
    ) {

        $this->authorize('view', $partido);

        $partido->load([

            'responsable',

            'comentarios.usuario'

        ]);

        return view('partidos.show', compact(
            'torneo',
            'partido'
        ));
    }

    /**
     * Editar partido
     */
    public function edit(
        Torneo $torneo,
        Partido $partido
    ) {

        $this->authorize('update', $partido);

        $usuarios = User::orderBy('name')->get();

        return view('partidos.edit', compact(
            'torneo',
            'partido',
            'usuarios'
        ));
    }

    /**
     * Actualizar partido
     */
    public function update(
        UpdatePartidoRequest $request,
        Torneo $torneo,
        Partido $partido
    ) {

        $this->authorize('update', $partido);

        $partido->update($request->validated());

        return redirect()
            ->route('torneos.partidos.index', $torneo)
            ->with('success', 'Partido actualizado correctamente.');
    }

    /**
     * Eliminar partido
     */
    public function destroy(
        Torneo $torneo,
        Partido $partido
    ) {

        $this->authorize('delete', $partido);

        $partido->delete();

        return redirect()
            ->route('torneos.partidos.index', $torneo)
            ->with('success', 'Partido eliminado correctamente.');
    }
}