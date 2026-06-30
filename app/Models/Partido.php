<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partido extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'torneo_id',

        'equipo_local',

        'equipo_visitante',

        'fecha',

        'hora',

        'lugar',

        'estado',

        'responsable_id',

        'marcador_local',

        'marcador_visitante'

    ];

    protected $casts = [

        'fecha' => 'date',

        'hora' => 'datetime:H:i'

    ];

    /**
     * Torneo
     */
    public function torneo()
    {
        return $this->belongsTo(Torneo::class);
    }

    /**
     * Responsable
     */
    public function responsable()
    {
        return $this->belongsTo(
            User::class,
            'responsable_id'
        );
    }

    /**
     * Comentarios
     */
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

}