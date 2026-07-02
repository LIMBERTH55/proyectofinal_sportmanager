<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>403 - Acceso denegado</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white shadow-xl rounded-xl p-10 text-center max-w-lg">

    <h1 class="text-7xl font-bold text-red-600">

        403

    </h1>

    <h2 class="text-3xl font-bold mt-4">

        Acceso Denegado

    </h2>

    <p class="text-gray-600 mt-4">

        No tienes permisos para acceder a esta página.

    </p>

    <a href="{{ route('dashboard') }}"
       class="inline-block mt-8 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

        Volver al Dashboard

    </a>

</div>

</body>

</html>