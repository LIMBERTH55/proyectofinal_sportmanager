<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold">
            {{ $torneo->nombre }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-6xl">
            <div class="rounded-lg bg-white p-4 shadow-sm ring-1 ring-slate-200 sm:p-8">
                <div class="grid gap-6 sm:grid-cols-2">
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

                <div class="mt-5 overflow-x-auto">
                    <table class="w-full min-w-[680px] text-left text-sm">
                        <thead>
                            <tr class="bg-slate-100 text-xs font-black uppercase tracking-wide text-slate-500">
                                <th class="p-3">Nombre</th>
                                <th class="p-3">Correo</th>
                                <th class="p-3">Rol</th>
                                <th class="p-3">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100">
                            @foreach($torneo->miembros as $miembro)
                                <tr>
                                    <td class="p-3 font-bold text-slate-800">{{ $miembro->name }}</td>
                                    <td class="p-3 text-slate-600">{{ $miembro->email }}</td>
                                    <td class="p-3 text-slate-600">{{ ucfirst($miembro->pivot->torneo_role) }}</td>
                                    <td class="p-3">
                                        @can('update', $torneo)
                                            <form method="POST" action="{{ route('miembros.destroy', [$torneo, $miembro]) }}">
                                                @csrf
                                                @method('DELETE')

                                                <button class="font-bold text-red-600">
                                                    Quitar
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @can('update', $torneo)
                    <hr class="my-8">

                    <h3 class="mb-4 text-xl font-bold">
                        Agregar Miembro
                    </h3>

                    <form method="POST" action="{{ route('miembros.store', $torneo) }}">
                        @csrf

                        <div class="grid gap-3 md:grid-cols-[1fr_180px_auto]">
                            <select name="user_id" class="w-full rounded-lg border border-slate-300 p-2.5">
                                @foreach($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}">
                                        {{ $usuario->name }}
                                    </option>
                                @endforeach
                            </select>

                            <select name="torneo_role" class="w-full rounded-lg border border-slate-300 p-2.5">
                                <option value="organizador">Organizador</option>
                                <option value="entrenador">Entrenador</option>
                                <option value="invitado">Invitado</option>
                            </select>

                            <button class="rounded-lg bg-emerald-600 px-5 py-2.5 font-bold text-white transition hover:bg-emerald-700">
                                Agregar
                            </button>
                        </div>
                    </form>
                @endcan

                <hr class="my-8">

                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <h3 class="text-xl font-bold">
                        Partidos del Torneo
                    </h3>

                    @can('update', $torneo)
                        <a href="{{ route('torneos.partidos.create', $torneo) }}"
                            class="inline-flex items-center justify-center rounded-lg bg-emerald-600 px-5 py-2 font-bold text-white transition hover:bg-emerald-700">
                            Nuevo Partido
                        </a>
                    @endcan
                </div>

                @if($torneo->partidos->count())
                    <div class="mt-4 overflow-x-auto">
                        <table class="w-full min-w-[640px] text-left text-sm">
                            <thead>
                                <tr class="bg-slate-100 text-xs font-black uppercase tracking-wide text-slate-500">
                                    <th class="p-3">Título</th>
                                    <th class="p-3">Estado</th>
                                    <th class="p-3">Responsable</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-100">
                                @foreach($torneo->partidos as $partido)
                                    <tr>
                                        <td class="p-3 font-bold text-slate-800">
                                            {{ $partido->equipo_local }} vs {{ $partido->equipo_visitante }}
                                        </td>
                                        <td class="p-3 text-slate-600">
                                            {{ ucfirst($partido->estado) }}
                                        </td>
                                        <td class="p-3 text-slate-600">
                                            {{ optional($partido->responsable)->name ?? 'Sin asignar' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="mt-4 rounded-lg border border-blue-200 bg-blue-50 p-4 text-blue-900">
                        Todavía no existen partidos registrados para este torneo.
                    </div>
                @endif

                <div class="mt-8">
                    <a href="{{ route('torneos.index') }}"
                        class="inline-flex items-center justify-center rounded-lg bg-slate-700 px-5 py-2 font-bold text-white transition hover:bg-slate-800">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
