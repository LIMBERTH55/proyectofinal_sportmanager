<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Partido;
use App\Http\Requests\StoreComentarioRequest;

class ComentarioController extends Controller
{
    /**
     * Guardar comentario
     */
    public function store(
        StoreComentarioRequest $request,
        Partido $partido
    )
    {
        $this->authorize('create', Comentario::class);

        Comentario::create([

            'cuerpo' => $request->cuerpo,

            'user_id' => auth()->id(),

            'partido_id' => $partido->id,

        ]);

        return back()->with(
            'success',
            'Comentario agregado correctamente.'
        );
    }

    /**
     * Editar comentario
     */
    public function update(
        StoreComentarioRequest $request,
        Comentario $comentario
    )
    {
        $this->authorize('update', $comentario);

        $comentario->update([

            'cuerpo'=>$request->cuerpo

        ]);

        return back()->with(
            'success',
            'Comentario actualizado.'
        );
    }

    /**
     * Eliminar comentario
     */
    public function destroy(
        Comentario $comentario
    )
    {
        $this->authorize('delete',$comentario);

        $comentario->delete();

        return back()->with(
            'success',
            'Comentario eliminado.'
        );
    }
}