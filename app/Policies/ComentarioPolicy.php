<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comentario;

class ComentarioPolicy
{
    public function create(User $user): bool
    {
        return $user->can('comentar');
    }

    public function update(User $user, Comentario $comentario): bool
    {
        return $user->hasRole('Administrador')

            ||

            $comentario->user_id==$user->id;
    }

    public function delete(User $user, Comentario $comentario): bool
    {
        return $user->hasRole('Administrador')

            ||

            $comentario->user_id==$user->id;
    }
}