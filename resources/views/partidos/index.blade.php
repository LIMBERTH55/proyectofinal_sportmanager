<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="text-2xl font-bold">
                Partidos del Torneo
            </h2>

            @can('create', App\Models\Partido::class)

                <a href="{{ route('torneos.partidos.create',$torneo) }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

                    Nuevo Partido

                </a>

            @endcan

        </div>
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto">

            @if(session('success'))

                <div class="bg-green-100 border border-green-400 text-green-700 p-4 rounded mb-5">

                    {{ session('success') }}

                </div>

            @endif

            <div class="bg-white shadow rounded-lg overflow-hidden">

                <table class="w-full">

                    <thead class="bg-gray-100">

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

                    <tbody>

                        @forelse($partidos as $partido)

                        <tr class="border-b">

                            <td class="p-3">

                                {{ $partido->equipo_local }}

                            </td>

                            <td class="p-3">

                                {{ $partido->equipo_visitante }}

                            </td>

                            <td class="p-3">

                                {{ $partido->fecha->format('d/m/Y') }}

                            </td>

                            <td class="p-3">

                                {{ substr($partido->hora,0,5) }}

                            </td>

                            <td class="p-3">

                                {{ ucfirst(str_replace('_',' ',$partido->estado)) }}

                            </td>

                            <td class="p-3 font-bold">

                                {{ $partido->marcador_local }}

                                -

                                {{ $partido->marcador_visitante }}

                            </td>

                            <td class="p-3">

                                <div class="flex gap-3">

                                    <a href="{{ route('torneos.partidos.show',[$torneo,$partido]) }}"
                                       class="text-blue-600">

                                        Ver

                                    </a>

                                    @can('update',$partido)

                                    <a href="{{ route('torneos.partidos.edit',[$torneo,$partido]) }}"
                                       class="text-yellow-600">

                                        Editar

                                    </a>

                                    @endcan

                                    @can('delete',$partido)

                                    <form method="POST"
                                          action="{{ route('torneos.partidos.destroy',[$torneo,$partido]) }}">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('¿Eliminar partido?')"
                                            class="text-red-600">

                                            Eliminar

                                        </button>

                                    </form>

                                    @endcan

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="7"
                                class="text-center p-5">

                                No existen partidos registrados.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-6">

                {{ $partidos->links() }}

            </div>

        </div>

    </div>

</x-app-layout>