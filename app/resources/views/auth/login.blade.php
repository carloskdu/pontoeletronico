<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Login - Ponto Eletrônico</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
            width: 100%;
            max-width: 400px;
        }

        .login-container h2 {
            margin-bottom: 1.5rem;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 0.2rem;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 0.7rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #2e86de;
            color: white;
            border: none;
            padding: 0.7rem;
            width: 100%;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
        }

        .error {
            color: red;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="cpf">CPF</label>
            <input type="text" id="cpf" name="cpf" value="{{ old('cpf') }}" required>

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required>

            <button type="submit">Entrar</button>
        </form>
    </div>
</body>

</html>
