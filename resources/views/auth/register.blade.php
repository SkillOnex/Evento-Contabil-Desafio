@extends('layouts.app')

@section('title', 'Registro')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold text-center mb-6">Criar Conta</h2>
    <form id="registerForm" class="space-y-4">
        <div>
            <label for="name" class="block mb-1 text-sm font-medium">Nome</label>
            <input type="text" id="name" name="name" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label for="email" class="block mb-1 text-sm font-medium">E-mail</label>
            <input type="email" id="email" name="email" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label for="password" class="block mb-1 text-sm font-medium">Senha</label>
            <input type="password" id="password" name="password" required minlength="6"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label for="password_confirmation" class="block mb-1 text-sm font-medium">Confirme a Senha</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>
        <button type="submit"
                class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition">
            Registrar
        </button>
        <p id="registerError" class="text-sm text-red-600 hidden text-center mt-2"></p>
        <p id="registerSuccess" class="text-sm text-green-600 hidden text-center mt-2"></p>
    </form>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        //Captura form de registro
        $('#registerForm').submit(function (e) {
            e.preventDefault();

            //Recolhe as informações
            const name = $('#name').val();
            const email = $('#email').val();
            const password = $('#password').val();
            const password_confirmation = $('#password_confirmation').val();

            //Faz a requisição
            $.ajax({
                url: 'api/register',
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    name,
                    email,
                    password,
                    password_confirmation
                }),
                success: function (response) {
                    $('#registerSuccess').removeClass('hidden').text(response.message);
                    $('#registerError').addClass('hidden');
                    $('#registerForm')[0].reset();

                    // Redireciona após sucesso  
                    setTimeout(() => {
                        window.location.href = '/login';
                    }, 2000);
                },
                error: function (xhr) {
                    let errorMessage = 'Erro ao registrar.';
                    if (xhr.responseJSON?.errors) {
                        const errors = xhr.responseJSON.errors;
                        errorMessage = Object.values(errors).flat().join(' ');
                    }
                    $('#registerError').removeClass('hidden').text(errorMessage);
                    $('#registerSuccess').addClass('hidden');
                }
            });
        });
    });
</script>
@endpush
