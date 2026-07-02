<x-app-layout>
    <div class="mx-auto max-w-7xl space-y-8">
        <x-flash-message />

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-lg bg-blue-600 p-6 text-white shadow-sm">
                <h3 class="text-sm font-bold uppercase tracking-wide text-blue-100">Torneos</h3>
                <p class="mt-3 text-4xl font-black">{{ $totalTorneos }}</p>
            </div>

            <div class="rounded-lg bg-emerald-600 p-6 text-white shadow-sm">
                <h3 class="text-sm font-bold uppercase tracking-wide text-emerald-100">Partidos</h3>
                <p class="mt-3 text-4xl font-black">{{ $totalPartidos }}</p>
            </div>

            <div class="rounded-lg bg-violet-600 p-6 text-white shadow-sm">
                <h3 class="text-sm font-bold uppercase tracking-wide text-violet-100">Usuarios</h3>
                <p class="mt-3 text-4xl font-black">{{ $totalUsuarios }}</p>
            </div>

            <div class="rounded-lg bg-amber-500 p-6 text-white shadow-sm">
                <h3 class="text-sm font-bold uppercase tracking-wide text-amber-100">Comentarios</h3>
                <p class="mt-3 text-4xl font-black">{{ $totalComentarios }}</p>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-2">
            <section class="rounded-lg bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <h3 class="text-xl font-black text-slate-900">Estado de los Partidos</h3>
                <div class="mt-5 grid gap-3 sm:grid-cols-2">
                    <div class="rounded-lg bg-slate-50 p-4">
                        <p class="text-sm font-bold text-slate-500">Programados</p>
                        <p class="mt-1 text-2xl font-black text-slate-900">{{ $programados }}</p>
                    </div>
                    <div class="rounded-lg bg-slate-50 p-4">
                        <p class="text-sm font-bold text-slate-500">En juego</p>
                        <p class="mt-1 text-2xl font-black text-slate-900">{{ $enJuego }}</p>
                    </div>
                    <div class="rounded-lg bg-slate-50 p-4">
                        <p class="text-sm font-bold text-slate-500">Finalizados</p>
                        <p class="mt-1 text-2xl font-black text-slate-900">{{ $finalizados }}</p>
                    </div>
                    <div class="rounded-lg bg-slate-50 p-4">
                        <p class="text-sm font-bold text-slate-500">Suspendidos</p>
                        <p class="mt-1 text-2xl font-black text-slate-900">{{ $suspendidos }}</p>
                    </div>
                </div>
            </section>

            <section class="rounded-lg bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <h3 class="text-xl font-black text-slate-900">Ultimos Torneos</h3>
                <div class="mt-5 divide-y divide-slate-100">
                    @forelse($ultimosTorneos as $torneo)
                        <div class="flex items-center justify-between py-3">
                            <span class="font-bold text-slate-700">{{ $torneo->nombre }}</span>
                            <span class="rounded-md bg-slate-100 px-2 py-1 text-xs font-bold text-slate-500">
                                {{ $torneo->estado ?? 'Sin estado' }}
                            </span>
                        </div>
                    @empty
                        <p class="text-sm text-slate-500">No hay torneos registrados.</p>
                    @endforelse
                </div>
            </section>
        </div>

        <section class="rounded-lg bg-white p-6 shadow-sm ring-1 ring-slate-200">
            <h3 class="text-xl font-black text-slate-900">Ultimos Partidos</h3>
            <div class="mt-5 overflow-x-auto">
                <table class="w-full min-w-[620px] text-left text-sm">
                    <thead>
                        <tr class="border-b border-slate-200 text-xs font-black uppercase tracking-wide text-slate-500">
                            <th class="py-3">Local</th>
                            <th class="py-3">Visitante</th>
                            <th class="py-3">Fecha</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($ultimosPartidos as $partido)
                            <tr>
                                <td class="py-3 font-bold text-slate-800">{{ $partido->equipo_local }}</td>
                                <td class="py-3 font-bold text-slate-800">{{ $partido->equipo_visitante }}</td>
                                <td class="py-3 text-slate-500">{{ optional($partido->fecha)->format('d/m/Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-6 text-center text-slate-500">No hay partidos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-app-layout>
