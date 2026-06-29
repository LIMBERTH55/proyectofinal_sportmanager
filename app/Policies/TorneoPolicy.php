<?php

namespace App\Policies;

use App\Models\Torneo;
use App\Models\User;

class TorneoPolicy
{
    /**
     * Ver cualquier torneo
     */
    public function viewAny(User $user): bool
    {
        return $user->can('ver torneo');
    }

    /**
     * Ver un torneo específico
     */
    public function view(User $user, Torneo $torneo): bool
    {
        return $user->hasRole('Administrador')
            || $torneo->owner_id === $user->id
            || $torneo->miembros()->where('users.id', $user->id)->exists();
    }

    /**
     * Crear torneo
     */
    public function create(User $user): bool
    {
        return $user->can('crear torneo');
    }

    /**
     * Editar torneo
     */
    public function update(User $user, Torneo $torneo): bool
    {
        return $user->hasRole('Administrador')
            || (
                $user->can('editar torneo')
                && $torneo->owner_id === $user->id
            );
    }

    /**
     * Eliminar torneo
     */
    public function delete(User $user, Torneo $torneo): bool
    {
        return $user->hasRole('Administrador')
            || (
                $user->can('eliminar torneo')
                && $torneo->owner_id === $user->id
            );
    }
}