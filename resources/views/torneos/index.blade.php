<x-app-layout>

    <x-slot name="header">

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

            <h2 class="text-2xl font-bold">

                Gestión de Torneos

            </h2>

            @can('crear torneo')

                <a href="{{ route('torneos.create') }}" class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-5 py-2 font-bold text-white transition hover:bg-blue-700">

                    Nuevo Torneo

                </a>

            @endcan

        </div>

    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto">

            <x-flash-message />

            <div class="rounded-lg bg-white p-4 shadow-sm ring-1 ring-slate-200 sm:p-6">

                @include('torneos.buscador')

                @include('torneos.tabla')

            </div>

        </div>

    </div>

</x-app-layout>
