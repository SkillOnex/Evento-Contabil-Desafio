<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Exibe a tela de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // View após o login bem-sucedido  
    public function inicio()
    {
        return view('inicio');
    }
}
