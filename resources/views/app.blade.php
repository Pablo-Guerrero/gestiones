<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Título dinámico de la página con Inertia.js -->
        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts y rutas con Ziggy -->
        @routes
        <!-- Cargar el archivo principal de Vite (incluye tus scripts y estilos) -->
        @vite(['resources/js/app.js'])
        <!-- Cargar el encabezado dinámico de Inertia.js -->
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        <!-- Cargar la aplicación Inertia.js -->
        @inertia
    </body>
</html>
