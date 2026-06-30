<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [

        'cuerpo',

        'user_id',

        'partido_id'

    ];

    /**
     * Usuario
     */
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Partido
     */
    public function partido()
    {
        return $this->belongsTo(Partido::class);
    }
}