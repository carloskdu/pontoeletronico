<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Acesso Negado</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 30px;
            background: #f8f9fa;
            text-align: center;
        }

        h1 {
            color: #dc3545;
        }
    </style>
</head>

<body>
    <h1>403 - Acesso Negado</h1>
    <p>{{ $exception->getMessage() }}</p>
    <a href="{{ url()->previous() }}">Voltar</a>
</body>

</html>
