<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome_completo', 'cpf', 'email', 'senha', 'cargo', 'data_nascimento',
        'cep', 'logradouro', 'complemento', 'bairro', 'cidade', 'estado',
    ];

    protected $hidden = ['senha'];

    public function getAuthPassword()
    {
        return $this->senha;
    }
}
