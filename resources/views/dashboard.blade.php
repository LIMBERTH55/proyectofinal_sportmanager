<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            SportManager - Panel Principal
        </h2>
    </x-slot>
    @role('Administrador')

<div class="bg-red-100 p-4 rounded mt-4">

    <h2 class="text-xl font-bold">

        Panel de Administración

    </h2>

</div>

@endrole
@role('Organizador')

<div class="bg-green-100 p-4 rounded mt-4">

    <h2 class="text-xl font-bold">

        Panel del Organizador

    </h2>

</div>

@endrole
@role('Entrenador')

<div class="bg-blue-100 p-4 rounded mt-4">

    <h2 class="text-xl font-bold">

        Panel del Entrenador

    </h2>

</div>

@endrole
@role('Invitado')

<div class="bg-yellow-100 p-4 rounded mt-4">

    <h2 class="text-xl font-bold">

        Panel Invitado

    </h2>

</div>

@endrole
@can('crear torneo')

<a href="#"
   class="bg-green-600 text-white px-4 py-2 rounded">

    Crear Torneo

</a>

@endcan
@can('gestionar usuarios')

<a href="#"
   class="bg-red-600 text-white px-4 py-2 rounded">

    Administrar Usuarios

</a>

@endcan

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <h3 class="text-2xl font-bold mb-4">
                        Bienvenido {{ auth()->user()->name }}
                    </h3>

                    <p>
                        Sistema Web de Gestión de Torneos Deportivos.
                    </p>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>