<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\EspacoCafe;
use App\Http\Controllers\EventoController;

class GetCafesTest extends TestCase
{
    use RefreshDatabase; // Reseta o banco de dados entre os testes

    public function test_get_cafes_returns_all_cafes()
    {
        // Arrange: cria 3 registros de espaços de café no banco
        EspacoCafe::factory()->count(3)->create();

        // Act: instancia o controller e chama o método getCafes
        $controller = new EventoController();
        $result = $controller->getCafes();

        // Assert: verifica se o resultado possui a chave 'cafes'
        $this->assertArrayHasKey('cafes', $result);
        // Verifica se o array 'cafes' possui exatamente 3 elementos
        $this->assertCount(3, $result['cafes']);
    }
}
