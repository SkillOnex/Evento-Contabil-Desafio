<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Adicione links para o seu CSS, como o Tailwind CSS -->
    <!-- Fonts -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    @vite('resources/js/app.js') <!-- Caso esteja usando Vite -->
</head>

<body class="bg-gray-100">

    <section class="h-screen grid grid-cols-1 md:grid-cols-2 bg-gray-100">

        <div class="relative hidden md:block w-full h-full">
            <img src="{{ asset('storage/imgs/118332.jpg') }}" alt="Imagem" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-black opacity-80"></div>
            <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4">
                <h1 class="text-white text-3xl md:text-5xl font-bold">Criar Conta</h1>
                <p class="text-white text-lg md:text-2xl mt-2 font-mono">Seu acesso começa aqui.</p>
            </div>
        </div>

        <!-- LADO DIREITO: Formulário de Registro -->
        <div class="flex items-center justify-center px-6 py-8 bg-white dark:bg-gray-900">
            <div class="w-full max-w-md space-y-6">
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('storage/imgs/logo.png') }}" alt="Logo" class="w-64 object-contain" />
                </div>
                <form method="POST" action="{{ route('register') }}" class="space-y-4 md:space-y-6">
                    @csrf

                    <!-- Tipo de Usuário -->
                    <div>
                        <label for="user_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de
                            usuário</label>
                        <select id="user_type" name="user_type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option value="individual">Pessoa Física</option>
                            <option value="company">Pessoa Jurídica</option>
                        </select>
                    </div>

                    <!-- Nome Completo -->
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome
                            completo</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Seu nome completo" required>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seu
                            email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="name@company.com" required>
                    </div>

                   
                    <!-- Senha -->
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Senha</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>

                    <!-- Confirmação de Senha -->
                    <div>
                        <label for="password_confirmation"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmar
                            senha</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>

                    <!-- Termos e Condições -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" name="terms" type="checkbox"
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                                required>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-light text-gray-500 dark:text-gray-300">Eu aceito os <a
                                    class="font-medium text-blue-600 hover:underline dark:text-blue-500" href="#">Termos e
                                    Condições</a></label>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Criar uma conta
                    </button>

                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Já tem uma conta? <a href="{{ route('login') }}"
                            class="font-medium text-blue-600 hover:underline dark:text-blue-500">Faça login aqui</a>
                    </p>
                </form>

                @if ($errors->any())
                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>




    </section>

@endsection

</body>

</html>