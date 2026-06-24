<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            SportManager - Panel Principal
        </h2>
    </x-slot>

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