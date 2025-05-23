<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario; 
use Illuminate\Support\Facades\Hash; 

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create([
            'nome_completo' => 'Carlos Eduardo Alves',
            'cpf' => '19351367045',
            'email' => 'admin@example.com',
            'senha' => Hash::make('123456'),
            'cargo' => 'administrador',
            'data_nascimento' => '1990-01-01',
            'cep' => '12345678',
            'cidade' => 'Exemplo',
            'estado' => 'SP',
        ]);

        Usuario::create([
            'nome_completo' => 'Jose da Silva',
            'cpf' => '66655023092',
            'email' => 'funcionario@example.com',
            'senha' => Hash::make('654321'),
            'cargo' => 'funcionario',
            'data_nascimento' => '1990-01-01',
            'cep' => '12345678',
            'cidade' => 'Exemplo',
            'estado' => 'SP',
        ]);
    }
}
