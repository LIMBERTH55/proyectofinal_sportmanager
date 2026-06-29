<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | RELACIONES
    |--------------------------------------------------------------------------
    */

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
        return $this->hasMany(Comentario::class);
    }
}