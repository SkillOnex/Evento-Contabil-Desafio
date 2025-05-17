@extends('layouts.app')

@section('title', 'Registro')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold text-center mb-6">Criar Conta</h2>
    <form class="space-y-4" method="POST" action="{{ route('register.perform') }}">
        @csrf
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
        <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition">
            Registrar
        </button>

        @if ($errors->any())
        <div class="text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </form>
</div>
@endsection
