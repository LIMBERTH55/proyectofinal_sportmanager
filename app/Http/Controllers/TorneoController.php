<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use App\Models\User;
use App\Http\Requests\StoreTorneoRequest;
use App\Http\Requests\UpdateTorneoRequest;
use Illuminate\Http\Request;

class TorneoController extends Controller
{
    /**
     * Mostrar listado de torneos.
     */
    public function index(Request $request)
    {
        $query = Torneo::with('propietario');

        // Buscar
        $query->buscar($request->buscar);

        // Filtrar
        $query->estado($request->estado);

        // Si no es administrador solo ve torneos propios o donde es miembro.
        if (!auth()->user()->hasRole('Administrador')) {
            $query->where(function ($q) {
                $q->where('owner_id', auth()->id())
                    ->orWhereHas('miembros', function ($miembros) {
                        $miembros->where('users.id', auth()->id());
                    });
            });
        }

        $torneos = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('torneos.index', compact('torneos'));
    }

    /**
     * Formulario de creación.
     */
    public function create()
    {
        $this->authorize('create', Torneo::class);

        return view('torneos.create');
    }

    /**
     * Guardar torneo.
     */
    public function store(StoreTorneoRequest $request)
    {
        $this->authorize('create', Torneo::class);

        $torneo = Torneo::create([

            'nombre' => $request->nombre,

            'descripcion' => $request->descripcion,

            'estado' => $request->estado,

            'owner_id' => auth()->id()

        ]);

        // Agregar automáticamente al creador como miembro
        $torneo->miembros()->attach(auth()->id(), [

            'torneo_role' => 'organizador'

        ]);

        return redirect()
            ->route('torneos.index')
            ->with('success', 'Torneo creado correctamente.');
    }

    /**
     * Mostrar detalle.
     */
    public function show(Torneo $torneo)
    {
        $this->authorize('view', $torneo);

        $torneo->load([
            'propietario',
            'partidos.responsable',
            'miembros'
        ]);

        $usuarios = User::orderBy('name')->get();

        return view('torneos.show', compact(
            'torneo',
            'usuarios'
        ));

        
    }

    /**
     * Editar torneo.
     */
    public function edit(Torneo $torneo)
    {
        $this->authorize('update', $torneo);

        return view('torneos.edit', compact('torneo'));
    }

    /**
     * Actualizar torneo.
     */
    public function update(UpdateTorneoRequest $request, Torneo $torneo)
    {
        $this->authorize('update', $torneo);

        $torneo->update([

            'nombre' => $request->nombre,

            'descripcion' => $request->descripcion,

            'estado' => $request->estado

        ]);

        return redirect()
            ->route('torneos.index')
            ->with('success', 'Torneo actualizado correctamente.');
    }

    /**
     * Eliminar torneo.
     */
    public function destroy(Torneo $torneo)
    {
        $this->authorize('delete', $torneo);

        $torneo->delete();

        return redirect()
            ->route('torneos.index')
            ->with('success', 'Torneo eliminado correctamente.');
    }

    /**
     * Ver torneos eliminados.
     */
    public function eliminados()
    {
        $torneos = Torneo::onlyTrashed()
            ->with('propietario')
            ->paginate(10);

        return view('torneos.eliminados', compact('torneos'));
    }

    /**
     * Restaurar torneo.
     */
    public function restore($id)
    {
        $torneo = Torneo::onlyTrashed()->findOrFail($id);

        $this->authorize('restore', $torneo);

        $torneo->restore();

        return redirect()
            ->route('torneos.eliminados')
            ->with('success', 'Torneo restaurado correctamente.');
    }
}
