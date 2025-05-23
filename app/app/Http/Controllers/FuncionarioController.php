<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Rules\CpfValido;

class FuncionarioController extends Controller
{
    public function index()
    {
        // Listar funcionários do admin logado
        $adminId = Auth::id();
        $funcionarios = Usuario::with('administrador')->get();
                              
        return view('funcionarios.index', compact('funcionarios'));
    }

    public function create()
    {
        return view('funcionarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_completo' => 'required|string|max:255',
            'cpf' => ['required', 'digits:11', new CpfValido],
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|min:6',
            'data_nascimento' => 'required|date',
            'cep' => 'required|string|max:10',
            'logradouro' => 'required|string|max:255',
            'complemento' => 'nullable|string|max:255',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
        ]);
     
         Usuario::create([
                'nome_completo' => $request->nome_completo,
                'cpf' => $request->cpf,
                'email' => $request->email,
                'senha' => Hash::make($request->senha),
                'cargo' => $request->cargo,
                'data_nascimento' => $request->data_nascimento,
                'cep' => $request->cep,
                'logradouro' => $request->logradouro,
                'complemento' => $request->complemento,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'estado' => $request->estado,
                'administrador_id' => Auth::id(),
            ]);

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário criado com sucesso!');
    }

    public function edit(Usuario $funcionario)
    {
        $this->authorizeFuncionario($funcionario);
        return view('funcionarios.edit', compact('funcionario'));
    }

    public function update(Request $request, Usuario $funcionario)
    {
        $this->authorizeFuncionario($funcionario);

        $request->validate([
        'nome_completo' => 'required|string|max:255',
        'cpf' => ['required', 'string', 'max:11', Rule::unique('usuarios', 'cpf')->ignore($funcionario->id)],
        'email' => ['required', 'email', Rule::unique('usuarios', 'email')->ignore($funcionario->id)],
        'data_nascimento' => 'required|date',
        'senha' => 'nullable|confirmed|min:6',
        'cep' => 'required|string|max:10',
        'logradouro' => 'required|string|max:255',
        'complemento' => 'nullable|string|max:255',
        'bairro' => 'required|string|max:255',
        'cidade' => 'required|string|max:255',
        'estado' => 'required|string|max:2',
    ]);

    $funcionario->update([
        'nome_completo' => $request->nome_completo,
        'cpf' => $request->cpf,
        'email' => $request->email,
        'senha' => $request->filled('senha') ? Hash::make($request->senha) : $funcionario->senha,
        'data_nascimento' => $request->data_nascimento,
        'cep' => $request->cep,
        'logradouro' => $request->logradouro,
        'complemento' => $request->complemento,
        'bairro' => $request->bairro,
        'cidade' => $request->cidade,
        'estado' => $request->estado,
    ]);

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso!');
    }

    public function destroy(Usuario $funcionario)
    {
        $this->authorizeFuncionario($funcionario);

        $funcionario->delete();
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário removido com sucesso!');
    }

    private function authorizeFuncionario(Usuario $funcionario)
    {
        if ($funcionario->administrador_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para editar este funcionário.');
        }
    }
}
