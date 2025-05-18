<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Exibe a tela de registro
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Processa o formulário de registro
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|not_regex:/[<>]/',
            'email' => 'required|email|unique:users,email|not_regex:/[<>]/',
            'password' => 'required|string|min:6|confirmed|not_regex:/[<>]/',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); // login automático após cadastro

        return redirect()->route('evento')->with('success', 'Registro realizado com sucesso!');
    }
}
