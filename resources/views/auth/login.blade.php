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
    <section class="h-screen grid grid-cols-1 md:grid-cols-2 bg-gray-50 dark:bg-gray-900">
        <!-- Lado esquerdo: Imagem com degradê -->
        <div class="relative hidden md:block w-full h-full">
        <img src="{{ asset('storage/imgs/118332.jpg') }}" alt="Imagem"
        class="w-full h-full object-cover brightness-50" />
            <!-- Camada escura com efeito moderno -->
            <div class="absolute inset-0 bg-gradient-to-br from-black/70 to-black/40"></div>

            <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-6">
                <h1 class="text-white text-4xl md:text-6xl font-extrabold drop-shadow-md">
                    Bem-vindo
                </h1>
                <p class="text-white text-xl md:text-2xl mt-4 font-light italic">
                    Problemas não esperam. Soluções também não.
                </p>
            </div>
        </div>

        <!-- Lado direito: Formulário -->
        <div class="flex items-center justify-center px-6 py-12">
            <div class="w-full max-w-md space-y-6 bg-white dark:bg-gray-800 shadow-xl rounded-xl p-8">
                <div class="flex justify-center">
                    <img src="{{ asset('storage/imgs/logo.png') }}" alt="Logo" class="w-48 mb-6" />
                </div>

                <form class="space-y-5" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <label for="email"
                            class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">E-mail</label>
                        <input id="email" name="email" type="email" placeholder="seuemail@exemplo.com" value="{{ old('email') }}"  required
                            class="w-full p-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">Senha</label>
                        <input id="password" name="password" placeholder="•••••" type="password" required
                            class="w-full p-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        @if (session('error'))
                            <p class="text-red-500 text-sm mt-1">{{ session('error') }}</p>
                        @endif
                    </div>

                    <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-300">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="mr-2 rounded">
                            Lembrar-me
                        </label>
                        <a href="#" class="text-blue-600 hover:underline dark:text-blue-400">Esqueceu a senha?</a>
                    </div>

                    <button type="submit"
                        class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-300">
                        Entrar
                    </button>

                    <p class="text-sm text-center text-gray-500 dark:text-gray-400 mt-4">
                        Não tem uma conta?
                        <a href="{{ route('register') }}" class="text-blue-600 hover:underline dark:text-blue-400">
                            Registre-se
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </section>

    </body>

</html>