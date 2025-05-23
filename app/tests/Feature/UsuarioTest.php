<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsuarioTest extends TestCase
{
    use RefreshDatabase;

    public function test_usuario_autenticado_tem_cargo_funcionario()
    {

        $usuario = Usuario::factory()->create([
            'cargo' => 'funcionario',
        ]);

        $this->actingAs($usuario);

        $this->assertEquals('funcionario', auth()->user()->cargo);
    }
}
