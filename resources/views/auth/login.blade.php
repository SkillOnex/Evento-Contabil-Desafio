@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold text-center mb-6">Login</h2>
    <form class="space-y-4" method="POST" action="{{ route('login.submit')}}">
        @csrf
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
        <p>Não possui uma conta? <a href="{{route('register')}}">Registre-se</a></p>
        @if ($errors->any())
        <p class="text-sm text-red-400 text-center mt-2">
            {{$errors->first()}}
        </p>
        @endif
    </form>
</div>
@endsection

