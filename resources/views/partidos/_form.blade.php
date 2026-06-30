<div class="space-y-6">

    <div class="grid grid-cols-2 gap-4">

        <div>
            <label class="block font-medium mb-2">
                Equipo Local
            </label>

            <input
                type="text"
                name="equipo_local"
                value="{{ old('equipo_local', $partido->equipo_local ?? '') }}"
                class="w-full border rounded-lg p-2">

            @error('equipo_local')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block font-medium mb-2">
                Equipo Visitante
            </label>

            <input
                type="text"
                name="equipo_visitante"
                value="{{ old('equipo_visitante', $partido->equipo_visitante ?? '') }}"
                class="w-full border rounded-lg p-2">

            @error('equipo_visitante')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

    </div>

    <div class="grid grid-cols-2 gap-4">

        <div>
            <label class="block font-medium mb-2">
                Fecha
            </label>

            <input
                type="date"
                name="fecha"
                value="{{ old('fecha', isset($partido) ? $partido->fecha?->format('Y-m-d') : '') }}"
                class="w-full border rounded-lg p-2">
        </div>

        <div>
            <label class="block font-medium mb-2">
                Hora
            </label>

            <input
                type="time"
                name="hora"
                value="{{ old('hora', $partido->hora ?? '') }}"
                class="w-full border rounded-lg p-2">
        </div>

    </div>

    <div>

        <label class="block font-medium mb-2">
            Lugar
        </label>

        <input
            type="text"
            name="lugar"
            value="{{ old('lugar', $partido->lugar ?? '') }}"
            class="w-full border rounded-lg p-2">

    </div>

    <div class="grid grid-cols-2 gap-4">

        <div>

            <label class="block font-medium mb-2">
                Estado
            </label>

            <select
                name="estado"
                class="w-full border rounded-lg p-2">

                <option value="programado">Programado</option>
                <option value="en_juego">En Juego</option>
                <option value="finalizado">Finalizado</option>
                <option value="suspendido">Suspendido</option>

            </select>

        </div>

        <div>

            <label class="block font-medium mb-2">
                Árbitro / Responsable
            </label>

            <select
                name="responsable_id"
                class="w-full border rounded-lg p-2">

                <option value="">Seleccione...</option>

                @foreach($usuarios as $usuario)

                    <option
                        value="{{ $usuario->id }}"
                        @selected(old('responsable_id',$partido->responsable_id ?? '')==$usuario->id)>

                        {{ $usuario->name }}

                    </option>

                @endforeach

            </select>

        </div>

    </div>

    <div class="grid grid-cols-2 gap-4">

        <div>

            <label class="block font-medium mb-2">

                Marcador Local

            </label>

            <input
                type="number"
                min="0"
                name="marcador_local"
                value="{{ old('marcador_local', $partido->marcador_local ?? 0) }}"
                class="w-full border rounded-lg p-2">

        </div>

        <div>

            <label class="block font-medium mb-2">

                Marcador Visitante

            </label>

            <input
                type="number"
                min="0"
                name="marcador_visitante"
                value="{{ old('marcador_visitante', $partido->marcador_visitante ?? 0) }}"
                class="w-full border rounded-lg p-2">

        </div>

    </div>

    <div class="flex gap-3">

        <button
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">

            Guardar

        </button>

        <a
            href="{{ route('torneos.partidos.index',$torneo) }}"
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">

            Cancelar

        </a>

    </div>

</div>