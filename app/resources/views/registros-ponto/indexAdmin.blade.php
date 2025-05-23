<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Registros de Ponto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            padding: 30px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
        }

        form {
            display: flex;
            gap: 20px;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="date"] {
            padding: 6px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button,
        a.button {
            padding: 8px 16px;
            border: none;
            text-decoration: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
        }

        button[type="submit"] {
            background-color: #007bff;
        }

        a.button {
            background-color: #6c757d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f8f9fa;
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Registros de Ponto</h1>

        <form method="GET" action="{{ route('registros-ponto.indexAdmin') }}">
            <div>
                <label for="data_inicio">Data Início:</label>
                <input type="date" name="data_inicio" value="{{ request('data_inicio') }}">
            </div>

            <div>
                <label for="data_fim">Data Fim:</label>
                <input type="date" name="data_fim" value="{{ request('data_fim') }}">
            </div>

            <div>
                <button type="submit">Filtrar</button>
                <a href="{{ route('registros-ponto.indexAdmin') }}" class="button">Limpar</a>
            </div>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Funcionário</th>
                    <th>Cargo</th>
                    <th>Idade</th>
                    <th>Gestor</th>
                    <th>Data e Hora</th>
                </tr>
            </thead>
            <tbody>
                @forelse($registros as $registro)
                    <tr>
                        <td>{{ $registro->id_registro }}</td>
                        <td>{{ $registro->funcionario }}</td>
                        <td>{{ ucfirst($registro->cargo) }}</td>
                        <td>{{ $registro->idade }} anos</td>
                        <td>{{ $registro->gestor ?? '—' }}</td>
                        <td>{{ \Carbon\Carbon::parse($registro->registrado_em)->format('d/m/Y H:i:s') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Nenhum registro encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pagination">
            @if (is_object($registros) && method_exists($registros, 'links'))
                <div style="margin-top: 20px;">
                    {{ $registros->links() }}
                </div>
            @endif
        </div>
    </div>
</body>

</html>
