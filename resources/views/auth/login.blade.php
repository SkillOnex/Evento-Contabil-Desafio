@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold text-center mb-6">Login</h2>
    <form id="loginForm" class="space-y-4">
        <div>
            <label for="email" class="block mb-1 text-sm font-medium">E-mail</label>
            <input type="email" id="email" name="email" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label for="password" class="block mb-1 text-sm font-medium">Senha</label>
            <input type="password" id="password" name="password" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>
        <button type="submit"
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
            Entrar
        </button>
        <p id="loginError" class="text-sm text-red-600 hidden text-center mt-2">Credenciais inválidas</p>
    </form>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        //Captura form de login
        $('#loginForm').submit(function (e) {
            e.preventDefault();

            //Recolhe as informações
            const email = $('#email').val();
            const password = $('#password').val();

            //Faz a requsição de login
            $.ajax({
                url: 'api/login',
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({ email, password }),
                success: function (response) {
                    //Armazena algumas informações na session
                    sessionStorage.setItem('auth_token', response.token);
                    sessionStorage.setItem('user', JSON.stringify(response.user));
                    window.location.href = "/inicio";
                },
                error: function () {
                    $('#loginError').removeClass('hidden').text('Credenciais inválidas');
                }
            });
        });
    });
</script>
@endpush
