<form method="GET" class="flex flex-wrap gap-3 mb-6">

    <input
        type="text"
        name="buscar"
        value="{{ request('buscar') }}"
        placeholder="Buscar torneo..."
        class="border rounded-lg p-2 w-72">

    <select
        name="estado"
        class="border rounded-lg p-2">

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
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 rounded">

        Buscar

    </button>

</form>