<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UsuarioFactory extends Factory
{
    protected $model = \App\Models\Usuario::class;

    public function definition()
    {
        return [
            'nome_completo' => $this->faker->name(),
            'cpf' => $this->faker->numerify('###########'), // 11 dígitos
            'email' => $this->faker->unique()->safeEmail(),
            'senha' => bcrypt('password'), // senha padrão
            'cargo' => $this->faker->randomElement(['administrador', 'funcionario']),
            'data_nascimento' => $this->faker->date(),
            'cep' => $this->faker->postcode(),
            'logradouro' => $this->faker->streetName(),
            'complemento' => $this->faker->secondaryAddress(),
            'bairro' => $this->faker->citySuffix(),
            'cidade' => $this->faker->city(),
            'estado' => $this->faker->stateAbbr(),
        ];
    }
}
