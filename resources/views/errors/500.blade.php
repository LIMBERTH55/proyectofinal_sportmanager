<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>500</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="text-center">

        <h1 class="text-8xl font-bold text-red-600">

            500

        </h1>

        <p class="text-2xl mt-4">

            Ocurrió un error interno.

        </p>

        <a href="{{ route('dashboard') }}" class="inline-block mt-6 bg-red-600 text-white px-6 py-3 rounded-lg">

            Volver

        </a>

    </div>

</body>

</html>