<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\SalaTreinamento;

class EventoServiceTest extends TestCase
{
    use RefreshDatabase; // Garante que o banco de dados será resetado entre os testes

    public function test_get_salas_returns_all_salas()
    {
        // Arrange: cria 2 registros de salas de treinamento no banco de dados
        SalaTreinamento::factory()->count(2)->create();

        // Act: recupera todas as salas do banco de dados
        $salas = SalaTreinamento::all();

        // Assert: verifica se foram retornadas exatamente 2 salas
        $this->assertCount(2, $salas);
    }
}
