<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SportManager - Panel Principal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            @role('Administrador')
                <div class="bg-red-100 border-l-4 border-red-500 p-4 rounded shadow-sm">
                    <h2 class="text-xl font-bold text-red-800">Panel de Administración</h2>
                </div>
            @endrole

            @role('Organizador')
                <div class="bg-green-100 border-l-4 border-green-500 p-4 rounded shadow-sm">
                    <h2 class="text-xl font-bold text-green-800">Panel del Organizador</h2>
                </div>
            @endrole

            @role('Entrenador')
                <div class="bg-blue-100 border-l-4 border-blue-500 p-4 rounded shadow-sm">
                    <h2 class="text-xl font-bold text-blue-800">Panel del Entrenador</h2>
                </div>
            @endrole

            @role('Invitado')
                <div class="bg-yellow-100 border-l-4 border-yellow-500 p-4 rounded shadow-sm">
                    <h2 class="text-xl font-bold text-yellow-800">Panel Invitado</h2>
                </div>
            @endrole

            <div class="flex flex-wrap gap-4 items-center">
                @can('crear torneo')
                    <a href="{{ route('torneos.create') }}" class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white font-medium px-5 py-2.5 rounded-lg transition duration-150 ease-in-out shadow-sm">
                        Crear Torneo
                    </a>
                @endcan

                @can('gestionar usuarios')
                    <a href="#" class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white font-medium px-5 py-2.5 rounded-lg transition duration-150 ease-in-out shadow-sm">
                        Administrar Usuarios
                    </a>
                @endcan

                <a href="{{ route('torneos.index') }}" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2.5 rounded-lg transition duration-150 ease-in-out shadow-sm">
                    Ver Torneos
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-2">
                        Bienvenido, {{ auth()->user()->name }}
                    </h3>
                    <p class="text-gray-600">
                        Sistema Web de Gestión de Torneos Deportivos.
                    </p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>