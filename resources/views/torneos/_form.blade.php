<div class="space-y-6">

    <div>
        <label class="block font-medium mb-2">
            Nombre del Torneo
        </label>

        <input
            type="text"
            name="nombre"
            value="{{ old('nombre', $torneo->nombre ?? '') }}"
            class="w-full border rounded-lg p-3">

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
            class="w-full border rounded-lg p-3">{{ old('descripcion', $torneo->descripcion ?? '') }}</textarea>

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
            class="w-full border rounded-lg p-3">

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

    <div class="flex gap-3">

        <button
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">

            Guardar

        </button>

        <a
            href="{{ route('torneos.index') }}"
            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">

            Cancelar

        </a>

    </div>

</div>