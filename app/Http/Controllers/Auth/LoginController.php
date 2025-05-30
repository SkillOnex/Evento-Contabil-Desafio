<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Exibe a tela de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // View após o login bem-sucedido
    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email|not_regex:/[<>]/',
            'password' => 'required|string|max:255|not_regex:/[<>]/',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/evento');
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ])->onlyInput('email');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
