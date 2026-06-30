<x-app-layout>

    <x-slot name="header">

        <h2 class="text-2xl font-bold">

            {{ $torneo->nombre }}

        </h2>

    </x-slot>

    <div class="py-6">

        <div class="max-w-6xl mx-auto">

            <div class="bg-white shadow rounded-lg p-8">

                <div class="grid grid-cols-2 gap-6">

                    <div>

                        <strong>Estado</strong>

                        <p>{{ ucfirst($torneo->estado) }}</p>

                    </div>

                    <div>

                        <strong>Propietario</strong>

                        <p>{{ $torneo->propietario->name }}</p>

                    </div>

                </div>

                <div class="mt-6">

                    <strong>Descripción</strong>

                    <p class="mt-2">

                        {{ $torneo->descripcion }}

                    </p>

                </div>

                <hr class="my-8">

                <h3 class="text-2xl font-bold">

                    Miembros del Torneo

                </h3>

                <table class="w-full mt-5">

                    <thead>

                        <tr class="bg-gray-100">

                            <th class="p-3">

                                Nombre

                            </th>

                            <th class="p-3">

                                Correo

                            </th>

                            <th class="p-3">

                                Rol

                            </th>

                            <th class="p-3">

                                Acciones

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($torneo->miembros as $miembro)

                            <tr class="border-b">

                                <td class="p-3">

                                    {{ $miembro->name }}

                                </td>

                                <td class="p-3">

                                    {{ $miembro->email }}

                                </td>

                                <td class="p-3">

                                    {{ ucfirst($miembro->pivot->torneo_role) }}

                                </td>

                                <td class="p-3">

                                    @can('update', $torneo)

                                        <form method="POST" action="{{ route('miembros.destroy', [$torneo, $miembro]) }}">

                                            @csrf

                                            @method('DELETE')

                                            <button class="text-red-600">

                                                Quitar

                                            </button>

                                        </form>

                                    @endcan

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

                @can('update', $torneo)

                    <hr class="my-8">

                    <h3 class="text-xl font-bold mb-4">

                        Agregar Miembro

                    </h3>

                    <form method="POST" action="{{ route('miembros.store', $torneo) }}">

                        @csrf

                        <div class="grid grid-cols-3 gap-4">

                            <select name="user_id" class="border rounded-lg p-2">

                                @foreach($usuarios as $usuario)

                                    <option value="{{ $usuario->id }}">

                                        {{ $usuario->name }}

                                    </option>

                                @endforeach

                            </select>

                            <select name="torneo_role" class="border rounded-lg p-2">

                                <option value="organizador">

                                    Organizador

                                </option>

                                <option value="entrenador">

                                    Entrenador

                                </option>

                                <option value="invitado">

                                    Invitado

                                </option>

                            </select>

                            <button class="bg-green-600 text-white rounded-lg">

                                Agregar

                            </button>

                        </div>

                    </form>

                @endcan

                <hr class="my-8">

                <div class="flex justify-between items-center">

                    <h3 class="text-xl font-bold">

                        Partidos del Torneo

                    </h3>

                    @can('update', $torneo)

                        <a href="{{ route('torneos.partidos.create', $torneo) }}"
                            class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg">

                            Nuevo Partido

                        </a>

                    @endcan

                </div>

                @if($torneo->partidos->count())

                    <table class="w-full mt-4">

                        <thead>

                            <tr class="bg-gray-100">

                                <th class="p-3">Título</th>

                                <th class="p-3">Estado</th>

                                <th class="p-3">Responsable</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($torneo->partidos as $partido)

                                <tr class="border-b">

                                    <td class="p-3">

                                        {{ $partido->titulo }}

                                    </td>

                                    <td class="p-3">

                                        {{ ucfirst($partido->estado) }}

                                    </td>

                                    <td class="p-3">

                                        {{ optional($partido->responsable)->name ?? 'Sin asignar' }}

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                @else

                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mt-4">

                        Todavía no existen partidos registrados para este torneo.

                    </div>

                @endif

                <div class="mt-8">

                    <a href="{{ route('torneos.index') }}"
                        class="bg-gray-700 hover:bg-gray-800 text-white px-5 py-2 rounded-lg">

                        Volver

                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>