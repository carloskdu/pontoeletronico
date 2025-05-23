<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Authenticatable
{   
    use HasFactory;
    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome_completo', 'cpf', 'email', 'senha', 'cargo', 'data_nascimento',
        'cep', 'logradouro', 'complemento', 'bairro', 'cidade', 'estado', 'administrador_id'
    ];

    protected $hidden = ['senha'];

    public function getAuthPassword()
    {
        return $this->senha;
    }

public function administrador()
    {
        return $this->belongsTo(Usuario::class, 'administrador_id');
    }

    public function funcionarios()
    {
        return $this->hasMany(Usuario::class, 'administrador_id');
    }

    public function registrosPonto()
    {
        return $this->hasMany(RegistroPonto::class, 'usuario_id');
    }
}
