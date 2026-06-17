<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partido extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'torneo_id',
        'responsable_id',
        'titulo',
        'descripcion',
        'estado',
        'prioridad',
        'fecha_partido'
    ];

    public function torneo()
    {
        return $this->belongsTo(Torneo::class);
    }

    public function responsable()
    {
        return $this->belongsTo(
            User::class,
            'responsable_id'
        );
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function etiquetas()
    {
        return $this->belongsToMany(Etiqueta::class);
    }
}