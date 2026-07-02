<div class="space-y-6">

    <div>
        <label class="block font-medium mb-2">
            Nombre del Torneo
        </label>

        <input
            type="text"
            name="nombre"
            value="{{ old('nombre', $torneo->nombre ?? '') }}"
            class="w-full rounded-lg border border-slate-300 p-3">

        @error('nombre')
            <p class="text-red-600 text-sm mt-1">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div>

        <label class="block font-medium mb-2">

            Descripción

        </label>

        <textarea
            rows="5"
            name="descripcion"
            class="w-full rounded-lg border border-slate-300 p-3">{{ old('descripcion', $torneo->descripcion ?? '') }}</textarea>

        @error('descripcion')
            <p class="text-red-600 text-sm mt-1">
                {{ $message }}
            </p>
        @enderror

    </div>

    <div>

        <label class="block font-medium mb-2">

            Estado

        </label>

        <select
            name="estado"
            class="w-full rounded-lg border border-slate-300 p-3">

            <option value="planificado"
                @selected(old('estado',$torneo->estado ?? '')=='planificado')>

                Planificado

            </option>

            <option value="activo"
                @selected(old('estado',$torneo->estado ?? '')=='activo')>

                Activo

            </option>

            <option value="finalizado"
                @selected(old('estado',$torneo->estado ?? '')=='finalizado')>

                Finalizado

            </option>

        </select>

    </div>

    <div class="flex flex-col gap-3 sm:flex-row">

        <button
            class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-6 py-2.5 font-bold text-white transition hover:bg-blue-700">

            Guardar

        </button>

        <a
            href="{{ route('torneos.index') }}"
            class="inline-flex items-center justify-center rounded-lg bg-slate-700 px-6 py-2.5 font-bold text-white transition hover:bg-slate-800">

            Cancelar

        </a>

    </div>

</div>
