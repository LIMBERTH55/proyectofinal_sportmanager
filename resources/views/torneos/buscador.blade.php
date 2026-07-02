<form method="GET" class="mb-6 grid gap-3 sm:grid-cols-[1fr_180px_auto]">

    <input
        type="text"
        name="buscar"
        value="{{ request('buscar') }}"
        placeholder="Buscar torneo..."
        class="w-full rounded-lg border border-slate-300 p-2.5">

    <select
        name="estado"
        class="w-full rounded-lg border border-slate-300 p-2.5">

        <option value="">Todos</option>

        <option value="planificado"
            @selected(request('estado')=="planificado")>

            Planificado

        </option>

        <option value="activo"
            @selected(request('estado')=="activo")>

            Activo

        </option>

        <option value="finalizado"
            @selected(request('estado')=="finalizado")>

            Finalizado

        </option>

    </select>

    <button
        class="rounded-lg bg-blue-600 px-5 py-2.5 font-bold text-white transition hover:bg-blue-700">

        Buscar

    </button>

</form>
