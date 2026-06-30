<x-app-layout>

    <x-slot name="header">

        <div class="flex justify-between">

            <h2 class="text-2xl font-bold">

                Gestión de Torneos

            </h2>

            @can('crear torneo')

                <a href="{{ route('torneos.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg">

                    Nuevo Torneo

                </a>

            @endcan

        </div>

    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto">

            @if(session('success'))

                <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded mb-5">

                    {{ session('success') }}

                </div>

            @endif

            <div class="bg-white shadow rounded-lg p-6">

                @include('torneos.buscador')

                @include('torneos.tabla')

            </div>

        </div>

    </div>

</x-app-layout>