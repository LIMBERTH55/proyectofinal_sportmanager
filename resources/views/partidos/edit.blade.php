<x-app-layout>

    <x-slot name="header">

        <h2 class="text-2xl font-bold">

            Editar Partido

        </h2>

    </x-slot>

    <div class="py-6">

        <div class="max-w-5xl mx-auto bg-white rounded-lg shadow p-6">

            <form method="POST" action="{{ route('torneos.partidos.update', [$torneo, $partido]) }}">

                @csrf

                @method('PUT')

                @include('partidos._form')

            </form>

        </div>

    </div>

</x-app-layout>