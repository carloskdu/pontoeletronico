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
            'nome_completo' => 'Administrador',
            'cpf' => '12345678900',
            'email' => 'admin@example.com',
            'senha' => Hash::make('123456'),
            'cargo' => 'administrador',
            'data_nascimento' => '1990-01-01',
            'cep' => '12345678',
            'cidade' => 'Exemplo',
            'estado' => 'SP',
        ]);

        Usuario::create([
            'nome_completo' => 'Funcionário',
            'cpf' => '00987654321',
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
