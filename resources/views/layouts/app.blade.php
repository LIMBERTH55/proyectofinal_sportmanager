<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SportManager</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-slate-100">

<div class="flex min-h-screen">

    {{-- Sidebar --}}
    @include('layouts.sidebar')

    {{-- Contenido --}}
    <div class="flex-1 flex flex-col">

        {{-- Navbar --}}
        @include('layouts.navigation')

        @isset($header)
            <div class="border-b border-slate-200 bg-white px-4 py-5 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        @endisset

        {{-- Contenido principal --}}
        <main class="flex-1 p-4 sm:p-6 lg:p-8">

            {{ $slot }}

        </main>

        {{-- Footer --}}
        @include('layouts.footer')

    </div>

</div>

</body>

</html>
