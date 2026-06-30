<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use App\Models\User;
use Illuminate\Http\Request;

class MiembroController extends Controller
{
    /**
     * Agregar miembro
     */
    public function store(Request $request, Torneo $torneo)
    {
        $this->authorize('update', $torneo);

        $request->validate([

            'user_id' => 'required|exists:users,id',

            'torneo_role' => 'required'

        ]);

        // Evita duplicados
        if (!$torneo->miembros()->where('users.id', $request->user_id)->exists()) {

            $torneo->miembros()->attach(
                $request->user_id,
                [
                    'torneo_role' => $request->torneo_role
                ]
            );
        }

        return back()->with(
            'success',
            'Miembro agregado correctamente.'
        );
    }

    /**
     * Actualizar rol
     */
    public function update(
        Request $request,
        Torneo $torneo,
        User $user
    ) {
        $this->authorize('update', $torneo);

        $request->validate([

            'torneo_role' => 'required'

        ]);

        $torneo->miembros()->updateExistingPivot(

            $user->id,

            [

                'torneo_role' => $request->torneo_role

            ]

        );

        return back()->with(
            'success',
            'Rol actualizado.'
        );
    }

    /**
     * Eliminar miembro
     */
    public function destroy(
        Torneo $torneo,
        User $user
    ) {
        $this->authorize('update', $torneo);

        $torneo->miembros()->detach($user->id);

        return back()->with(
            'success',
            'Miembro eliminado.'
        );
    }
}