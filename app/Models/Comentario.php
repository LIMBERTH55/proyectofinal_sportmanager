<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        'contenido',
        'user_id',
        'partido_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function partido()
    {
        return $this->belongsTo(Partido::class);
    }
}