<x-app-layout>

    <x-slot name="header">

        <h2 class="text-2xl font-bold">

            Nuevo Torneo

        </h2>

    </x-slot>

    <div class="py-6">

        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-6">

            <form method="POST" action="{{ route('torneos.store') }}">

                @csrf

                @include('torneos._form')

            </form>

        </div>

    </div>

</x-app-layout>