<div class="space-y-6">

    <div class="grid gap-4 md:grid-cols-2">

        <div>
            <label class="block font-medium mb-2">
                Equipo Local
            </label>

            <input
                type="text"
                name="equipo_local"
                value="{{ old('equipo_local', $partido->equipo_local ?? '') }}"
                class="w-full rounded-lg border border-slate-300 p-2.5">

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
                class="w-full rounded-lg border border-slate-300 p-2.5">

            @error('equipo_visitante')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

    </div>

    <div class="grid gap-4 md:grid-cols-2">

        <div>
            <label class="block font-medium mb-2">
                Fecha
            </label>

            <input
                type="date"
                name="fecha"
                value="{{ old('fecha', isset($partido) ? $partido->fecha?->format('Y-m-d') : '') }}"
                class="w-full rounded-lg border border-slate-300 p-2.5">
        </div>

        <div>
            <label class="block font-medium mb-2">
                Hora
            </label>

            <input
                type="time"
                name="hora"
                value="{{ old('hora', $partido->hora ?? '') }}"
                class="w-full rounded-lg border border-slate-300 p-2.5">
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
            class="w-full rounded-lg border border-slate-300 p-2.5">

    </div>

    <div class="grid gap-4 md:grid-cols-2">

        <div>

            <label class="block font-medium mb-2">
                Estado
            </label>

            <select
                name="estado"
                class="w-full rounded-lg border border-slate-300 p-2.5">

                <option value="programado" @selected(old('estado', $partido->estado ?? 'programado') == 'programado')>
                    Programado
                </option>
                <option value="en_juego" @selected(old('estado', $partido->estado ?? 'programado') == 'en_juego')>
                    En Juego
                </option>
                <option value="finalizado" @selected(old('estado', $partido->estado ?? 'programado') == 'finalizado')>
                    Finalizado
                </option>
                <option value="suspendido" @selected(old('estado', $partido->estado ?? 'programado') == 'suspendido')>
                    Suspendido
                </option>

            </select>

        </div>

        <div>

            <label class="block font-medium mb-2">
                Árbitro / Responsable
            </label>

            <select
                name="responsable_id"
                class="w-full rounded-lg border border-slate-300 p-2.5">

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

    <div class="grid gap-4 md:grid-cols-2">

        <div>

            <label class="block font-medium mb-2">

                Marcador Local

            </label>

            <input
                type="number"
                min="0"
                name="marcador_local"
                value="{{ old('marcador_local', $partido->marcador_local ?? 0) }}"
                class="w-full rounded-lg border border-slate-300 p-2.5">

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
                class="w-full rounded-lg border border-slate-300 p-2.5">

        </div>

    </div>

    <div class="flex flex-col gap-3 sm:flex-row">

        <button
            class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-6 py-2.5 font-bold text-white transition hover:bg-blue-700">

            Guardar

        </button>

        <a
            href="{{ route('torneos.partidos.index',$torneo) }}"
            class="inline-flex items-center justify-center rounded-lg bg-slate-700 px-6 py-2.5 font-bold text-white transition hover:bg-slate-800">

            Cancelar

        </a>

    </div>

</div>
