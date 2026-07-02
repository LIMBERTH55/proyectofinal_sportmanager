<div class="overflow-x-auto">
    <table class="w-full min-w-[680px] text-left text-sm">
        <thead>
            <tr class="bg-slate-100 text-xs font-black uppercase tracking-wide text-slate-500">
                <th class="p-3">Nombre</th>
                <th class="p-3">Estado</th>
                <th class="p-3">Propietario</th>
                <th class="p-3">Acciones</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-slate-100">
            @forelse($torneos as $torneo)
                <tr>
                    <td class="p-3 font-bold text-slate-800">
                        {{ $torneo->nombre }}
                    </td>

                    <td class="p-3 text-slate-600">
                        {{ ucfirst($torneo->estado) }}
                    </td>

                    <td class="p-3 text-slate-600">
                        {{ $torneo->propietario->name }}
                    </td>

                    <td class="p-3">
                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('torneos.show', $torneo) }}" class="font-bold text-blue-600">
                                Ver
                            </a>

                            @can('update', $torneo)
                                <a href="{{ route('torneos.edit', $torneo) }}" class="font-bold text-amber-600">
                                    Editar
                                </a>
                            @endcan

                            @can('delete', $torneo)
                                <form action="{{ route('torneos.destroy', $torneo) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('¿Eliminar torneo?')" class="font-bold text-red-600">
                                        Eliminar
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-6 text-center text-slate-500">
                        No existen torneos.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-5">
    {{ $torneos->links() }}
</div>
