<?php

namespace App\Policies;

use App\Models\Partido;
use App\Models\User;

class PartidoPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('ver partido');
    }

    public function view(User $user, Partido $partido): bool
    {
        return $user->hasRole('Administrador')
            || $partido->torneo->owner_id == $user->id
            || $partido->torneo
                ->miembros()
                ->where('users.id', $user->id)
                ->exists();
    }

    public function create(User $user): bool
    {
        return $user->can('crear partido');
    }

    public function update(User $user, Partido $partido): bool
    {
        return $user->hasRole('Administrador')
            || (
                $user->can('editar partido')
                && $partido->torneo->owner_id == $user->id
            );
    }

    public function delete(User $user, Partido $partido): bool
    {
        return $user->hasRole('Administrador')
            || (
                $user->can('eliminar partido')
                && $partido->torneo->owner_id == $user->id
            );
    }
}