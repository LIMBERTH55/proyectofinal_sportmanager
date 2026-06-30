<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Torneo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'torneos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
        'owner_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Propietario del torneo
     */
    public function propietario()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * Partidos del torneo
     */
    public function partidos()
    {
        return $this->hasMany(Partido::class);
    }

    /**
     * Miembros del torneo
     */
    public function miembros()
    {
        return $this->belongsToMany(
            User::class,
            'torneo_user'
        )
        ->withPivot('torneo_role')
        ->withTimestamps();
    }

    /**
     * Scope para buscar por nombre
     */
    public function scopeBuscar($query, $texto)
    {
        if ($texto) {
            $query->where('nombre', 'ILIKE', "%{$texto}%");
        }
    }

    /**
     * Scope para filtrar por estado
     */
    public function scopeEstado($query, $estado)
    {
        if ($estado) {
            $query->where('estado', $estado);
        }
    }
}