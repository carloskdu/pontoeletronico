<h1>Alterar Funcionário</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('funcionarios.update', $funcionario->id) }}">
    @csrf
    @method('PUT')

    <label>Nome completo:</label>
    <input type="text" name="nome_completo" value="{{ $funcionario->nome_completo }}" required><br>

    <label>CPF:</label>
    <input type="text" name="cpf" value="{{ $funcionario->cpf }}" required><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ $funcionario->email }}" required><br>

    <label>Nova Senha (opcional):</label>
    <input type="password" name="senha"><br>

    <label>Confirmar Nova Senha:</label>
    <input type="password" name="senha_confirmation"><br>

    <label>Data de Nascimento:</label>
    <input type="date" name="data_nascimento" value="{{ $funcionario->data_nascimento }}" required><br>

    <label>CEP:</label>
    <input type="text" name="cep" value="{{ $funcionario->cep }}" required><br>

    <label>Logradouro:</label>
    <input type="text" name="logradouro" value="{{ $funcionario->logradouro }}" required><br>

    <label>Complemento:</label>
    <input type="text" name="complemento" value="{{ $funcionario->complemento }}"><br>

    <label>Bairro:</label>
    <input type="text" name="bairro" value="{{ $funcionario->bairro }}" required><br>

    <label>Cidade:</label>
    <input type="text" name="cidade" value="{{ $funcionario->cidade }}" required><br>

    <label>Estado (UF):</label>
    <input type="text" name="estado" value="{{ $funcionario->estado }}" maxlength="2" required><br>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">

        <button type="submit"
            style="background-color: #007bff; color: white; padding: 10px; text-decoration: none; border-radius: 4px; border: none;">
            Atualizar
        </button>


        <a href="{{ route('funcionarios.index') }}"
            style="background-color: #4CAF50; color: white; padding: 10px; text-decoration: none; border-radius: 4px; border: none;">
            Voltar
        </a>
    </div>
</form>
