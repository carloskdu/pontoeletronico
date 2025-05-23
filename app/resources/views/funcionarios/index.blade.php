<!DOCTYPE html>
<html>

<head>
    <title>Funcionários</title>
    <style>
        body {
            font-family: sans-serif;
            background: #f9f9f9;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        a,
        button {
            margin-right: 5px;
        }

        .actions form {
            display: inline;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="top-bar">
        <h1>Funcionários</h1>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
        <a href="{{ route('funcionarios.create') }}"
            style="background-color: #007bff; color: white; padding: 30px 5px; text-decoration: none; border-radius: 4px; border: none;">+
            Novo Funcionário</a>
    </div>
    <a href="{{ route('logout') }}" class="logout"
        style="background-color: #ee2525; color: white; padding: 5px; text-decoration: none; border-radius: 4px; border: none;"
        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        Sair
    </a>
    <br />
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Cargo</th>
                <th>Administrador</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->nome_completo }}</td>
                    <td>{{ $funcionario->cpf }}</td>
                    <td>{{ $funcionario->email }}</td>
                    <td>{{ ucfirst($funcionario->cargo) }}</td>
                    <td>
                        {{ $funcionario->administrador ? $funcionario->administrador->nome_completo : 'Não atribuído' }}
                    </td>
                    <td class="actions">
                        <div style="display: flex; gap: 10px;">
                            <a href="{{ route('funcionarios.edit', $funcionario) }}"
                                style="background-color: #4CAF50; color: white; padding: 8px 12px; text-decoration: none; border-radius: 4px;">Editar</a>

                            <form action="{{ route('funcionarios.destroy', $funcionario) }}" method="POST"
                                onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    style="background-color: #f44336; color: white; padding: 8px 12px;text-decoration: none;  border-radius: 4px;">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
