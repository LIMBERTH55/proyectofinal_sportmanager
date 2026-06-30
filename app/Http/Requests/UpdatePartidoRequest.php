<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePartidoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [

            'equipo_local' => 'required|string|max:100',

            'equipo_visitante' => 'required|string|max:100',

            'fecha' => 'required|date',

            'hora' => 'required',

            'lugar' => 'required|string|max:150',

            'estado' => 'required|in:programado,en_juego,finalizado,suspendido',

            'responsable_id' => 'nullable|exists:users,id',

            'marcador_local' => 'nullable|integer|min:0',

            'marcador_visitante' => 'nullable|integer|min:0',

        ];
    }
}