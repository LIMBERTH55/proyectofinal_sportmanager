<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function torneos()
    {
        return $this->belongsToMany(
            Torneo::class,
            'torneo_user'
        )->withPivot('torneo_role')
            ->withTimestamps();
    }

    public function torneosPropietario()
    {
        return $this->hasMany(
            Torneo::class,
            'owner_id'
        );
    }

    public function partidosAsignados()
    {
        return $this->hasMany(
            Partido::class,
            'responsable_id'
        );
    }

    public function comentarios()
    {
        return $this->hasMany(
            Comentario::class
        );
    }
}
