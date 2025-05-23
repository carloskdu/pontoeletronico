<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RegistroPonto;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

    public function indexAdminSemEloquent2(Request $request)
    {
        $dataInicio = $request->input('data_inicio');
        $dataFim = $request->input('data_fim');

        $registros = DB::select("
            SELECT
                rp.id AS id_registro,
                f.nome_completo AS funcionario,
                f.cargo,
                FLOOR(DATEDIFF(CURDATE(), f.data_nascimento) / 365) AS idade,
                a.nome_completo AS gestor,
                rp.registrado_em
            FROM registros_ponto rp
            JOIN usuarios f ON rp.usuario_id = f.id
            LEFT JOIN usuarios a ON f.administrador_id = a.id
            WHERE 1 = 1
            AND (? IS NULL OR DATE(rp.registrado_em) >= ?)
            AND (? IS NULL OR DATE(rp.registrado_em) <= ?)
            ORDER BY rp.registrado_em DESC
        ", [
            $dataInicio, $dataInicio,
            $dataFim, $dataFim
        ]);

        return view('registros-ponto.indexAdmin', compact('registros'));
    }

}

