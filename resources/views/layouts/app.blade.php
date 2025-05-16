<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Minha Aplicação')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite -->
    <script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    @stack('head')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    @yield('content')

    @stack('scripts')
</body>
</html>
