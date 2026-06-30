<x-app-layout>

    <x-slot name="header">

        <h2 class="text-2xl font-bold">

            Torneos Eliminados

        </h2>

    </x-slot>

    <div class="py-6">

        <div class="max-w-6xl mx-auto bg-white shadow rounded-lg p-6">

            <table class="w-full">

                <thead>

                    <tr class="bg-gray-100">

                        <th class="p-3">Nombre</th>

                        <th class="p-3">Acción</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($torneos as $torneo)

                        <tr>

                            <td class="p-3">

                                {{ $torneo->nombre }}

                            </td>

                            <td class="p-3">

                                <form method="POST" action="{{ route('torneos.restore', $torneo->id) }}">

                                    @csrf

                                    @method('PATCH')

                                    <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">

                                        Restaurar

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="2" class="text-center p-5">

                                No existen torneos eliminados.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

            <div class="mt-5">

                {{ $torneos->links() }}

            </div>

        </div>

    </div>

</x-app-layout>