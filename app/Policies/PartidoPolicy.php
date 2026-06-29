<?php

namespace App\Policies;

use App\Models\Partido;
use App\Models\User;

class PartidoPolicy
{
    /**
     * Ver partidos
     */
    public function view(User $user, Partido $partido): bool
    {
        return $user->can('ver torneo');
    }

    /**
     * Crear partidos
     */
    public function create(User $user): bool
    {
        return $user->can('crear partido');
    }

    /**
     * Editar partido
     */
    public function update(User $user, Partido $partido): bool
    {
        return $user->hasRole('Administrador')
            || (
                $user->can('editar partido')
                && $partido->responsable_id === $user->id
            );
    }

    /**
     * Eliminar partido
     */
    public function delete(User $user, Partido $partido): bool
    {
        return $user->hasRole('Administrador')
            || $user->can('eliminar partido');
    }
}