<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTorneoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->can('crear torneo');
    }

    public function rules(): array
    {
        return [

            'nombre' => [
                'required',
                'string',
                'max:150'
            ],

            'descripcion' => [
                'nullable',
                'string',
                'max:1000'
            ],

            'estado' => [
                'required',
                'in:planificado,activo,finalizado'
            ]

        ];
    }

    public function messages(): array
    {
        return [

            'nombre.required' => 'Debe ingresar el nombre del torneo.',

            'estado.required' => 'Seleccione un estado.',

        ];
    }
}