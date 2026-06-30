<x-app-layout>

    <x-slot name="header">

        <h2 class="text-2xl font-bold">

            Detalle del Partido

        </h2>

    </x-slot>

    <div class="py-6">

        <div class="max-w-5xl mx-auto">

            <div class="bg-white shadow rounded-lg p-8">

                <div class="grid grid-cols-2 gap-6">

                    <div>

                        <h3 class="text-xl font-bold">

                            {{ $partido->equipo_local }}

                        </h3>

                    </div>

                    <div>

                        <h3 class="text-xl font-bold text-right">

                            {{ $partido->equipo_visitante }}

                        </h3>

                    </div>

                </div>

                <div class="text-center text-4xl font-bold mt-6">

                    {{ $partido->marcador_local }}

                    -

                    {{ $partido->marcador_visitante }}

                </div>

                <hr class="my-8">

                <div class="grid grid-cols-2 gap-5">

                    <div>

                        <strong>Fecha:</strong>

                        {{ $partido->fecha->format('d/m/Y') }}

                    </div>

                    <div>

                        <strong>Hora:</strong>

                        {{ substr($partido->hora, 0, 5) }}

                    </div>

                    <div>

                        <strong>Lugar:</strong>

                        {{ $partido->lugar }}

                    </div>

                    <div>

                        <strong>Estado:</strong>

                        {{ ucfirst(str_replace('_', ' ', $partido->estado)) }}

                    </div>

                    <div>

                        <strong>Árbitro:</strong>

                        {{ optional($partido->responsable)->name ?? 'Sin asignar' }}

                    </div>

                </div>

                <div class="mt-8">

                    <a href="{{ route('torneos.partidos.index', $torneo) }}"
                        class="bg-gray-700 hover:bg-gray-800 text-white px-6 py-2 rounded">

                        Volver

                    </a>

                </div>

                <hr class="my-8">

                <h3 class="text-xl font-bold mb-4">

                    Comentarios

                </h3>

                <form method="POST" action="{{ route('comentarios.store', $partido) }}">

                    @csrf

                    <textarea name="cuerpo" rows="4" class="w-full border rounded-lg p-3"
                        placeholder="Escriba un comentario..."></textarea>

                    @error('cuerpo')

                        <p class="text-red-600">

                            {{ $message }}

                        </p>

                    @enderror

                    <button class="mt-3 bg-blue-600 text-white px-5 py-2 rounded-lg">

                        Comentar

                    </button>

                </form>

                <div class="mt-8">

                    @forelse($partido->comentarios as $comentario)

                        <div class="border rounded-lg p-4 mb-4">

                            <div class="flex justify-between">

                                <strong>

                                    {{ $comentario->usuario->name }}

                                </strong>

                                <small>

                                    {{ $comentario->created_at->diffForHumans() }}

                                </small>

                            </div>

                            <p class="mt-3">

                                {{ $comentario->cuerpo }}

                            </p>

                            @can('delete', $comentario)

                                <form method="POST" action="{{ route('comentarios.destroy', $comentario) }}" class="mt-3">

                                    @csrf

                                    @method('DELETE')

                                    <button class="text-red-600">

                                        Eliminar

                                    </button>

                                </form>

                            @endcan

                        </div>

                    @empty

                        <div class="bg-gray-100 p-4 rounded">

                            Todavía no existen comentarios.

                        </div>

                    @endforelse
                </div>

            </div>

        </div>

    </div>

</x-app-layout>