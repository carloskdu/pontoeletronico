<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Usuario; 
use Illuminate\Support\Facades\Hash; 

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'cpf' => 'required|string',
            'senha' => 'required|string',
        ]);

        $usuario = Usuario::where('cpf', $request->cpf)->first();
        
        if ($usuario && Hash::check($request->senha, $usuario->senha)) {
            Auth::login($usuario);

             if ($usuario->cargo === 'funcionario') {
                return redirect()->route('ponto.index');
            }

            return redirect()->intended('funcionarios'); 
        }
        dd('Usuário ou senha inválido');
        return back()->withErrors(['cpf' => 'CPF ou senha inválidos']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}

