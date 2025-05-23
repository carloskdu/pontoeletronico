<!DOCTYPE html>
<html>

<head>
    <title>Novo Funcionário</title>
    <style>
        body {
            font-family: sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            max-width: 600px;
            margin: auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
        }
    </style>
</head>

<body>
    <h1>Novo Funcionário</h1>
    <form method="POST" action="{{ route('funcionarios.store') }}">
        @csrf

        <div>
            <label>Nome completo</label><br>
            <input type="text" name="nome_completo" value="{{ old('nome_completo') }}">
            @error('nome_completo')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>CPF</label><br>
            <input type="text" id="cpf" name="cpf" value="{{ old('cpf') }}">
            @error('cpf')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>Email</label><br>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>Senha</label><br>
            <input type="password" name="senha">
            @error('senha')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <label>Cargo</label>
        <select name="cargo" required>
            <option value="funcionario">Funcionário</option>
            <option value="administrador">Administrador</option>
        </select>

        <label>Data de Nascimento</label>
        <input type="date" name="data_nascimento" value="{{ old('data_nascimento') }}">
        @error('data_nascimento')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label>CEP</label>
        <input type="text" name="cep" value="{{ old('cep') }}">

        <label>Logradouro</label>
        <input type="text" name="logradouro" value="{{ old('logradouro') }}">

        <label>Complemento</label>
        <input type="text" name="complemento" value="{{ old('complemento') }}">

        <label>Bairro</label>
        <input type="text" name="bairro" value="{{ old('bairro') }}">

        <label>Cidade</label>
        <input type="text" name="cidade" value="{{ old('cidade') }}">

        <label>Estado</label>
        <input type="text" name="estado" value="{{ old('estado') }}">

        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">

            <button type="submit"
                style="background-color: #007bff; color: white; padding: 10px; text-decoration: none; border-radius: 4px; border: none;">
                Cadastrar
            </button>


            <a href="{{ route('funcionarios.index') }}"
                style="background-color: #4CAF50; color: white; padding: 10px; text-decoration: none; border-radius: 4px; border: none;">
                Voltar
            </a>
        </div>
    </form>
    <script>
        document.getElementById('cpf').addEventListener('input', function(e) {
            this.value = this.value.replace(/\D/g, ''); // Remove tudo que não for número
        });


        document.addEventListener('DOMContentLoaded', function() {
            const cepInput = document.querySelector('input[name="cep"]');

            cepInput.addEventListener('blur', function() {
                const cep = cepInput.value.replace(/\D/g, '');

                if (cep.length !== 8) return;

                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.erro) {
                            alert('CEP não encontrado.');
                            return;
                        }

                        document.querySelector('input[name="logradouro"]').value = data.logradouro ||
                            '';
                        document.querySelector('input[name="bairro"]').value = data.bairro || '';
                        document.querySelector('input[name="cidade"]').value = data.localidade || '';
                        document.querySelector('input[name="estado"]').value = data.uf || '';
                    })
                    .catch(() => {
                        alert('Erro ao buscar o endereço.');
                    });
            });
        });
    </script>
</body>

</html>
