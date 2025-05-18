<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistema Evento')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>

    <style>
    .dataTable-input {
        background-color: #f1f5f9;
        /* cor de fundo */
        border: 1px solid #94a3b8;
        /* borda */
        color: #1e293b;
        /* texto */
        padding: 8px;
        border-radius: 6px;
    }

    .datatable-top {
        margin-left: -50% !important;
    }

    .input-style {
        @apply bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus: ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white;
    }

    .btn-next,
    .btn-prev,
    .btn-submit {
        @apply bg-blue-700 text-white px-4 py-2 rounded-lg hover: bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-sm;
    }

    /* Step ativo visualmente */
    .step-item.active span:first-child {
        @apply border-blue-600 text-blue-600 dark: border-blue-500 dark:text-blue-500;
    }

    .step-item.active h3,
    .step-item.active p {
        @apply text-blue-600 dark: text-blue-500;
    }

    .datatable-wrapper .datatable-bottom .datatable-pagination .datatable-pagination-list-item:last-of-type .datatable-pagination-list-item-link:after{
        display:none !important;
    }

    </style>

    @stack('head')
</head>

<body class="bg-gray-200 min-h-screen flex items-center justify-center">

    @yield('content')

    @stack('scripts')
</body>

</html>
