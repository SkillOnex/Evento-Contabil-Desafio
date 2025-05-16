<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Exibe a tela de login
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // View após o login bem-sucedido  
    public function inicio()
    {
        return view('login');
    }
}
