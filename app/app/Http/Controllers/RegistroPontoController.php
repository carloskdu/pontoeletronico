<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RegistroPonto;

class RegistroPontoController extends Controller
{
    public function index()
    {
        $registros = RegistroPonto::where('usuario_id', Auth::id())
                        ->orderByDesc('registrado_em')
                        ->take(10)
                        ->get();

        return view('ponto.index', compact('registros'));
    }

    public function registrar(Request $request)
    {
        $usuario = auth()->user();

        $ultimoRegistro = RegistroPonto::where('usuario_id', $usuario->id)
                            ->orderBy('registrado_em', 'desc')
                            ->first();

        $novoTipo = 'entrada';
        if ($ultimoRegistro && $ultimoRegistro->tipo === 'entrada') {
            $novoTipo = 'saida';
        }

        RegistroPonto::create([
            'usuario_id' => $usuario->id,
            'tipo' => $novoTipo,
            'registrado_em' => now(),
        ]);

        return redirect()->route('ponto.index')->with('success', 'Ponto registrado como ' . $novoTipo . '!');

    }
}

