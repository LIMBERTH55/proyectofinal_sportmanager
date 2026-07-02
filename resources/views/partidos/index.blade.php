<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-2xl font-bold">
                Partidos del Torneo
            </h2>

            @can('update', $torneo)
                <a href="{{ route('torneos.partidos.create', $torneo) }}"
                    class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-5 py-2 font-bold text-white transition hover:bg-blue-700">
                    Nuevo Partido
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl">
            <x-flash-message />

            <form method="GET" class="mb-6">
                <div class="grid gap-3 md:grid-cols-4">
                    <input type="text" name="buscar" placeholder="Buscar equipo..." value="{{ request('buscar') }}"
                        class="w-full rounded-lg border border-slate-300 p-2.5">

                    <select name="estado" class="w-full rounded-lg border border-slate-300 p-2.5">
                        <option value="">Todos</option>
                        <option value="programado" @selected(request('estado') == 'programado')>Programado</option>
                        <option value="en_juego" @selected(request('estado') == 'en_juego')>En Juego</option>
                        <option value="finalizado" @selected(request('estado') == 'finalizado')>Finalizado</option>
                        <option value="suspendido" @selected(request('estado') == 'suspendido')>Suspendido</option>
                    </select>

                    <input type="date" name="fecha" value="{{ request('fecha') }}"
                        class="w-full rounded-lg border border-slate-300 p-2.5">

                    <button class="rounded-lg bg-blue-600 px-5 py-2.5 font-bold text-white transition hover:bg-blue-700">
                        Buscar
                    </button>
                </div>
            </form>

            <div class="overflow-hidden rounded-lg bg-white shadow-sm ring-1 ring-slate-200">
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[760px] text-left text-sm">
                        <thead class="bg-slate-100 text-xs font-black uppercase tracking-wide text-slate-500">
                            <tr>
                                <th class="p-3">Local</th>
                                <th class="p-3">Visitante</th>
                                <th class="p-3">Fecha</th>
                                <th class="p-3">Hora</th>
                                <th class="p-3">Estado</th>
                                <th class="p-3">Marcador</th>
                                <th class="p-3">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100">
                            @forelse($partidos as $partido)
                                <tr>
                                    <td class="p-3 font-bold text-slate-800">{{ $partido->equipo_local }}</td>
                                    <td class="p-3 font-bold text-slate-800">{{ $partido->equipo_visitante }}</td>
                                    <td class="p-3 text-slate-600">{{ $partido->fecha->format('d/m/Y') }}</td>
                                    <td class="p-3 text-slate-600">{{ substr($partido->hora, 0, 5) }}</td>
                                    <td class="p-3 text-slate-600">{{ ucfirst(str_replace('_', ' ', $partido->estado)) }}</td>
                                    <td class="p-3 font-black text-slate-900">
                                        {{ $partido->marcador_local }} - {{ $partido->marcador_visitante }}
                                    </td>
                                    <td class="p-3">
                                        <div class="flex flex-wrap gap-3">
                                            <a href="{{ route('torneos.partidos.show', [$torneo, $partido]) }}"
                                                class="font-bold text-blue-600">
                                                Ver
                                            </a>

                                            @can('update', $partido)
                                                <a href="{{ route('torneos.partidos.edit', [$torneo, $partido]) }}"
                                                    class="font-bold text-amber-600">
                                                    Editar
                                                </a>
                                            @endcan

                                            @can('delete', $partido)
                                                <form method="POST"
                                                    action="{{ route('torneos.partidos.destroy', [$torneo, $partido]) }}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button onclick="return confirm('¿Eliminar partido?')"
                                                        class="font-bold text-red-600">
                                                        Eliminar
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="p-6 text-center text-slate-500">
                                        No existen partidos registrados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-6">
                {{ $partidos->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
