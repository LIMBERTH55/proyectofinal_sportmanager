<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Torneo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
        'owner_id'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class,'owner_id');
    }

    public function partidos()
    {
        return $this->hasMany(Partido::class);
    }

    public function miembros()
    {
        return $this->belongsToMany(
            User::class,
            'torneo_user'
        )->withPivot('torneo_role')
         ->withTimestamps();
    }
}