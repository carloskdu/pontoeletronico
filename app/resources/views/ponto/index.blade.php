<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <title>Registro de Ponto - {{ config('app.name') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 0 20px;
        }

        header {
            background: #007bff;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 22px;
        }

        header a.logout {
            color: white;
            text-decoration: none;
            font-weight: bold;
            border: 2px solid white;
            padding: 6px 12px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        header a.logout:hover {
            background-color: white;
            color: #007bff;
        }

        main {
            margin-top: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            background: white;
            padding: 25px 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgb(0 0 0 / 0.1);
        }

        ul {
            list-style: none;
            padding: 0;
            max-height: 300px;
            overflow-y: auto;
            margin-bottom: 25px;
        }

        ul li {
            padding: 10px 12px;
            border-bottom: 1px solid #ddd;
        }

        ul li:last-child {
            border-bottom: none;
        }

        button {
            background-color: #007bff;
            color: white;
            font-size: 18px;
            padding: 14px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .message {
            margin-bottom: 20px;
            padding: 12px 15px;
            border-radius: 4px;
            font-weight: bold;
        }

        .message.success {
            background-color: #d4edda;
            color: #155724;
        }

        .message.error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>

<body>
    <header>
        <h1>Registro de Ponto</h1>
        @if (Auth::check())
            <p>Bem-vindo, {{ Auth::user()->nome_completo }}</p>
        @endif
        <a href="{{ route('logout') }}" class="logout"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            Sair
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
    </header>

    <main>
        @if (session('success'))
            <div class="message success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="message error">{{ $errors->first() }}</div>
        @endif
        <form action="{{ route('ponto.registrar') }}" method="POST">
            @csrf
            <button type="submit">Registrar Ponto</button>
        </form>

        <ul>
            @foreach ($registros as $registro)
                <li>{{ $registro->registrado_em->format('d/m/Y H:i:s') }} - {{ ucfirst($registro->tipo) }}</li>
            @endforeach
        </ul>

    </main>
</body>

</html>
