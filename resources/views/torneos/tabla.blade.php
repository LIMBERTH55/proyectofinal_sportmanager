<table class="w-full">

    <thead>

        <tr class="bg-gray-100">

            <th class="p-3">Nombre</th>

            <th class="p-3">Estado</th>

            <th class="p-3">Propietario</th>

            <th class="p-3">Acciones</th>

        </tr>

    </thead>

    <tbody>

        @forelse($torneos as $torneo)

            <tr class="border-b">

                <td class="p-3">

                    {{ $torneo->nombre }}

                </td>

                <td class="p-3">

                    {{ ucfirst($torneo->estado) }}

                </td>

                <td class="p-3">

                    {{ $torneo->propietario->name }}

                </td>

                <td class="p-3">

                    <div class="flex gap-2">

                        <a href="{{ route('torneos.show', $torneo) }}" class="text-blue-600">

                            Ver

                        </a>

                        @can('update', $torneo)

                            <a href="{{ route('torneos.edit', $torneo) }}" class="text-yellow-600">

                                Editar

                            </a>

                        @endcan

                        @can('delete', $torneo)

                            <form action="{{ route('torneos.destroy', $torneo) }}" method="POST">

                                @csrf

                                @method('DELETE')

                                <button onclick="return confirm('¿Eliminar torneo?')" class="text-red-600">

                                    Eliminar

                                </button>

                            </form>

                        @endcan

                    </div>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="4" class="text-center p-5">

                    No existen torneos.

                </td>

            </tr>

        @endforelse

    </tbody>

</table>

<div class="mt-5">

    {{ $torneos->links() }}

</div>